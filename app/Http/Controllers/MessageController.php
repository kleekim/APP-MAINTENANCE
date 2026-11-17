<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    // Envoyer un message
    public function send(Request $request)
    {
        $request->validate([
            'contenu'     => 'required|string|max:1000',
            'receiver_id' => 'required|exists:users,id'
        ]);

        $message = Message::create([
            'sender_id'   => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'contenu'     => $request->contenu,
        ]);

        // Envoie en temps réel au destinataire
        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => $message->load('sender')
        ]);
    }

    // Récupérer l'historique d'une conversation
    public function history(Request $request)
    {
        $partnerId = $request->partner_id;
        $myId      = auth()->id();

        $messages = Message::where(function ($q) use ($myId, $partnerId) {
            $q->where('sender_id', $myId)
                ->where('receiver_id', $partnerId);
        })->orWhere(function ($q) use ($myId, $partnerId) {
            $q->where('sender_id', $partnerId)
                ->where('receiver_id', $myId);
        })
            ->with('sender')
            ->orderBy('created_at')
            ->get();

        // Marquer les messages reçus comme lus
        Message::where('sender_id', $partnerId)
            ->where('receiver_id', $myId)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json($messages);
    }

    // Compter les messages non lus (pour le badge)
    public function unreadCount()
    {
        $count = Message::where('receiver_id', auth()->id())
            ->whereNull('read_at')
            ->count();

        return response()->json(['count' => $count]);
    }
}
