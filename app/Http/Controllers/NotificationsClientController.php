<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request; 

class NotificationsClientController extends Controller
{
    public function notification()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Recuperer toutes les notifications (lues et non lues) 
        $notifications = $user->notifications()->paginate(10);

        // Marquer toutes comme lues automatiquement 
        $user->unreadNotifications->markAsRead();

        return view('CLIENTS.Clients_Particuliers.notifications_clients', compact('notifications'));
    }

    public function destroy($id)
    {

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);
        $notification->delete();

        return back()->with('success', 'Notification supprimée avec succès.');
    }
}
