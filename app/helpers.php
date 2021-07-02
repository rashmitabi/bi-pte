<?php 

use App\Models\User;
use App\Models\Settings;
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
function getSingleSettingValue($label)
{
    $lastValue = '';
    $result = Settings::where('label',$label)->first();
    if($result){
        $lastValue = $result->value;
    }
    return $lastValue;
}
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
?>