<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


//use Illuminate\Http\Request;

class NotificationsAdminController extends Controller
{
    public function notification()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Recuperer toutes les notifications (lues et non lues) 
        $notifications = $user->notifications()->paginate(10);

        // Marquer toutes comme lues automatiquement 
        $user->unreadNotifications->markAsRead();

        return view('admin.notification_admin', compact('notifications'));
    }

    public function destroy($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->delete();

        return back()->with('success', 'Notification supprimée avec succès.');
    }
}
