<?php

function check_isset_or_null($data, $value, $default_value){
    if(isset($data[$value]) && !empty($data[$value])){
        return $data[$value];
    }else{
        return $default_value;
    }
}

if (!function_exists('Logs')) {
    function Logs($message, array $context = [])
    {
        \Log::channel('daily_log')->debug($message, $context);
    }
}