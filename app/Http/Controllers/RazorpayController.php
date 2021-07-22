<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{

    public function createPlan($input)
    {
        
        $api_key = env('RAZOR_KEY');
        $api_secret = env('RAZOR_SECRET');
        $api = new Api($api_key, $api_secret);
        $plan          = $api->plan->create(
                            array('period' => 'weekly', 
                                'interval' => 1, 
                                'item' => array(
                                    'name' => 'Test Weekly 1 plan',
                                    'description' => 'Description for the weekly 1 plan', 
                                    'amount' => 600, 
                                    'currency' => 'INR')
                                )
                        );
    }
}
