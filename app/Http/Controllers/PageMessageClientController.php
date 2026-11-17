<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class PageMessageClientController extends Controller
{
    /**
     * Affiche la page de messagerie du client.
     */
    public function message()
    {
        $userId = auth()->id();

        $messages = Message::where(function ($q) use ($userId) {
            $q->where('sender_id', $userId)
              ->orWhere('receiver_id', $userId);
        })
        // Filtre les messages supprimés pour un utilisateur
        ->where(function ($q) use ($userId) {
            $q->where(function ($q2) use ($userId) {
                $q2->where('sender_id', $userId)
                   ->whereNull('deleted_by_sender_at');
            })->orWhere(function ($q2) use ($userId) {
                $q2->where('receiver_id', $userId)
                   ->whereNull('deleted_by_receiver_at');
            });
        })
        ->orderBy('created_at', 'asc')
        ->get();

        // Marquer les messages reçus comme lus
        Message::where('receiver_id', $userId)
               ->whereNull('read_at')
               ->update(['read_at' => now()]);

        $commercial = User::whereHas('roles', function ($q) {
            $q->where('name', 'commerciale');
        })->first();

        $commercialOnline = $commercial?->isOnline() ?? false;

        return view('CLIENTS.Clients_Particuliers.pagemessage', compact('messages', 'commercialOnline'));
    }

    /**
     * Envoie un message au commercial.
     */
    public function store(Request $request)
    {
        $request->validate(['message' => 'required|string|max:1000']);

        $commercial = User::whereHas('roles', function ($q) {
            $q->where('name', 'commerciale');
        })->first();

        if (!$commercial) {
            return back()->withErrors(['message' => 'Aucun commercial disponible.']);
        }

        Message::create([
            'sender_id'   => auth()->id(),
            'receiver_id' => $commercial->id,
            'contenu'     => $request->message,
        ]);

        return back();
    }

    /**
     * Endpoint JSON pour le polling (temps réel).
     */
    public function poll()
    {
        $userId = auth()->id();

        $messages = Message::where(function ($q) use ($userId) {
            $q->where('sender_id', $userId)
              ->orWhere('receiver_id', $userId);
        })
        
        // Filtre les messages supprimés pour cet utilisateur
        ->where(function ($q) use ($userId) {
            $q->where(function ($q2) use ($userId) {
                $q2->where('sender_id', $userId)
                   ->whereNull('deleted_by_sender_at');
            })->orWhere(function ($q2) use ($userId) {
                $q2->where('receiver_id', $userId)
                   ->whereNull('deleted_by_receiver_at');
            });
        })
        ->orderBy('created_at', 'asc')
        ->get()
        ->map(fn($m) => [
            'id'         => $m->id,
            'contenu'    => $m->contenu,
            'sent_by_me' => $m->sender_id == $userId,
            'time'       => $m->created_at->format('H:i'),
        ]);

        // Marquer les messages reçus comme lus
        Message::where('receiver_id', $userId)
               ->whereNull('read_at')
               ->update(['read_at' => now()]);

        return response()->json($messages);
    }

    /**
     * Nombre de messages non lus (badge navbar).
     */
    public function unreadCount()
    {
        $count = Message::where('receiver_id', auth()->id())
            ->whereNull('read_at')
            ->count();

        return response()->json(['count' => $count]);
    }

    /**
     * Supprime un message uniquement pour l'utilisateur connecté.
     */
    public function deleteForMe($id)
    {
        $userId = auth()->id();

        $message = Message::where('id', $id)
            ->where(function ($q) use ($userId) {
                $q->where('sender_id', $userId)
                  ->orWhere('receiver_id', $userId);
            })->firstOrFail();

        if ($message->sender_id === $userId) {
            $message->update(['deleted_by_sender_at' => now()]);
        } else {
            $message->update(['deleted_by_receiver_at' => now()]);
        }

        return response()->json(['success' => true]);
    }
}