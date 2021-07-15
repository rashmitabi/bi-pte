<?php 

use App\Models\User;
use App\Models\Settings;
use App\Models\Notifications;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

function getNotifications($limit = '5')
{
    $id   = \Auth::user()->id;
    $type = \Auth::user()->role->role_name;
    
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

function states()
{
    $states = [ 
        '1'=>'JAMMU AND KASHMI',
        '2'=>'HIMACHAL PRADESH',
        '3'=>'PUNJAB',
        '4'=>'CHANDIGARH',
        '5'=>'UTTARAKHAND',
        '6'=>'HARYANA',
        '7'=>'DELHI',
        '8'=>'RAJSTHAN',
        '9'=>'UTTAR PARDESH',
        '10'=>'BIHAR',
        '11'=>'SIKKIM',
        '12'=>'ARUNACHAL PRADESH',
        '13'=>'NAGALAND',
        '14'=>'MANIPUR',
        '15'=>'MIZORAM',
        '16'=>'TRIPURA',
        '17'=>'MEGHALAYA',
        '18'=>'ASSAM',
        '19'=>'WEST BENGAL',
        '20'=>'JHARKHAND',
        '21'=>'ODISHA',
        '22'=>'CHATTISGARH',
        '23'=>'MADHYA PRADESH',
        '24'=>'GUJARAT',
        '25'=>'DADRA AND NAGAR HAVELI',
        '26'=>'MAHARASHTRA',
        '27'=>'ANDHRA PRADESH',
        '28'=>'KARNATAKA',
        '29'=>'GOA',
        '30'=>'LAKSHADWWEP',
        '31'=>'KERALA',
        '32'=>'TAMIL NADU',
        '33'=>'PUDUCHERRY',
        '34'=>'ANDAMAN AND NICOBAR',
        '35'=>'TELANGANA',
        '36'=>'LADAKH'];
    
    return $states;
}
?>