<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use DataTables;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $notifications = getNotifications();
        $countNotifications = count($notifications);
        $role_id = \Auth::user()->role_id;
        $html_notifications   = view('notification', compact('notifications', 'role_id'))->render();

        
        return response()->json([
            'success' => 1,
            'count'   => $countNotifications,
            'html'=>$html_notifications    
        ]);
    }

}
