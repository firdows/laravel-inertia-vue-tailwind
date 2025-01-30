<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Gate;

class NotificationSeenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DatabaseNotification $notification)
    {
        // $this->authorize('update', $notification);
        // Gate::allows('update', $notification);
        Gate::authorize('update', $notification);

        $notification->markAsRead();
        return redirect()->back()
            ->with(
                'success',
                "Notification marked is read"
            );
    }
}
