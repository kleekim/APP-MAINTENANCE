<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageMessageController extends Controller
{
    /**
     * Affiche la page de messagerie du commercial.
     */
    public function message(Request $request)
    {
        $userId = Auth::id();

        // Marquer comme lus EN PREMIER (avant de compter les unread)
        if ($request->has('client')) {
            $activeClient = User::findOrFail($request->client);

            Message::where('sender_id', $activeClient->id)
                   ->where('receiver_id', $userId)
                   ->whereNull('read_at')
                   ->update(['read_at' => now()]);
        }

        // Charger les clients avec last_message, unread_count et statut en ligne
        $clients = User::whereHas('roles', function ($q) {
            $q->where('name', 'client');
        })->get();

        $onlineClientIds = User::getOnlineIds($clients->pluck('id')->toArray());

        $clients = $clients->map(function ($client) use ($userId, $onlineClientIds) {

            $last = Message::where(function ($q) use ($client, $userId) {
                $q->where('sender_id', $client->id)
                  ->where('receiver_id', $userId);
            })->orWhere(function ($q) use ($client, $userId) {
                $q->where('sender_id', $userId)
                  ->where('receiver_id', $client->id);
            })->latest()->first();

            $client->last_message      = $last?->contenu;
            $client->last_message_time = $last?->created_at->format('H:i');
            $client->unread_count      = Message::where('sender_id', $client->id)
                ->where('receiver_id', $userId)
                ->whereNull('read_at')
                ->count();
            $client->is_online         = $onlineClientIds->contains($client->id);

            return $client;
        });

        if (isset($activeClient)) {
            $activeClient->is_online = $onlineClientIds->contains($activeClient->id);
        }

        // Charger les messages du client actif
        $messages = collect();

        if ($request->has('client')) {
            $messages = Message::where(function ($q) use ($activeClient, $userId) {
                $q->where('sender_id', $userId)
                  ->where('receiver_id', $activeClient->id);
            })->orWhere(function ($q) use ($activeClient, $userId) {
                $q->where('sender_id', $activeClient->id)
                  ->where('receiver_id', $userId);
            })
            // Filtre les messages supprimés pour le commercial
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
        } else {
            $activeClient = null;
        }

        return view('commercial.pagemessage', compact('clients', 'activeClient', 'messages'));
    }

    /**
     * Envoie un message à un client.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'message'   => 'required|string',
        ]);

        Message::create([
            'sender_id'   => Auth::id(),
            'receiver_id' => $request->client_id,
            'contenu'     => $request->message,
        ]);

        return back();
    }

    /**
     * Supprime un message uniquement pour l'utilisateur connecté.
     */
    public function deleteForMe($id)
    {
        $userId = Auth::id();

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

    /**
     * Endpoint JSON polling — messages en temps réel.
     */
    public function poll(Request $request)
    {
        $request->validate(['client_id' => 'required|exists:users,id']);
        $clientId = $request->client_id;
        $userId   = Auth::id();

        $messages = Message::where(function ($q) use ($clientId, $userId) {
            $q->where('sender_id', $userId)
              ->where('receiver_id', $clientId);
        })->orWhere(function ($q) use ($clientId, $userId) {
            $q->where('sender_id', $clientId)
              ->where('receiver_id', $userId);
        })
        // Filtre les messages supprimés pour le commercial
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

        // Badge global non lus
        $totalUnread = Message::where('receiver_id', $userId)
            ->whereNull('read_at')
            ->count();

        // Marquer comme lus
        Message::where('sender_id', $clientId)
               ->where('receiver_id', $userId)
               ->whereNull('read_at')
               ->update(['read_at' => now()]);

        return response()->json([
            'messages'     => $messages,
            'total_unread' => $totalUnread,
        ]);
    }

    /**
     * Nombre de messages non lus par client (badges sidebar).
     */
    public function unreadCounts()
    {
        $counts = Message::where('receiver_id', Auth::id())
            ->whereNull('read_at')
            ->selectRaw('sender_id, count(*) as total')
            ->groupBy('sender_id')
            ->pluck('total', 'sender_id');

        return response()->json($counts);
    }
}