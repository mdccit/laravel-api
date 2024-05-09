<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendFirebaseNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendTestNotification(Request $request)
    {
      // Replace 1 with actual user ID or input from the request
      $user = User::find(1);

      // Check if the user exists
      if ($user) {
          // Send a notification if the user is found
          $user->notify(new SendFirebaseNotification('Test Notification', 'Hello from Laravel!'));

          return response()->json(['message' => 'Notification sent successfully.']);
      } else {
          // Return an error if the user is not found
          return response()->json(['error' => 'User not found'], 404);
      }
    }
}