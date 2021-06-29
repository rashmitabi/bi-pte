<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $notifications = getNotifications();
        $countNotifications = count($notifications);
        
        $html_notifications   = view('notification', compact('notifications'))->render();

        
        return response()->json([
            'success' => 1,
            'count'   => $countNotifications,
            'html'=>$html_notifications    
        ]);
    }
}
