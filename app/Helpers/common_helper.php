<?php

function check_isset_or_null($data, $value, $default_value){
    if(isset($data[$value]) && !empty($data[$value])){
        return $data[$value];
    }else{
        return $default_value;
    }
}

function get_cart_items()
{
    // get cart model item
    if (auth()->check()) {
        $data = App\Models\Cart::with('product')->where('user_id', auth()->id())->get();
        return $data;
    }
    
    return collect();
}

if (!function_exists('Logs')) {
    function Logs($message, array $context = [])
    {
        \Log::channel('daily_log')->debug($message, $context);
    }
}