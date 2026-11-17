<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationsRecouvrementController extends Controller
{
    public function notification()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $notifications = $user->notifications()->paginate(10);

        $user->unreadNotifications->markAsRead();

        return view('recouvrement.notification_recouvrement', compact('notifications'));
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