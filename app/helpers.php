<?php 

use App\Models\User;
use App\Models\Notifications;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

function getNotifications($limit = '5')
{
    $id             = \Auth::user()->id;
    $type           = \Auth::user()->role->role_name;
    
    $notifications  =  Notifications::where('user_id',$id)
            ->where('is_read', 'N')
            ->where('type', $type)
            ->limit($limit)
            ->orderBy('created_at','DESC')
            ->get();

    return $notifications;
}
?>