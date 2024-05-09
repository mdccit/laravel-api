<?php

namespace App\Http\Controllers;

use App\Notifications\SendFirebaseNotification;
use App\Models\User;

class NotificationController extends Controller
{
    public function sendFcm()
    {
        // Replace with an actual user who has a valid FCM token
        $user = User::find(1);
        
        // Send a test notification
        $user->notify(new SendFirebaseNotification('Test Notification', 'This is a test message from Laravel.'));

        return 'Notification Sent!';
    }
}
