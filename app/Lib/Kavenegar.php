<?php

namespace App\Lib;
use App\Models\SmsSetting;
use GuzzleHttp\Client;

class Kavenegar
{
    public static function sendVerificationCode($phone, $token, $token2 = '' , $token3 = '')
    {
        $setting = SmsSetting::first();
        if ($setting->kavenegar_token!='' && $setting->kavenegar_pattern!='') {
            $url = "https://api.kavenegar.com/v1/$setting->kavenegar_token/verify/lookup.json?receptor=$phone&token=$token&token2=$token2&token3=$token3&template=$setting->kavenegar_pattern";
            return (new Client())->get($url);
        }
    }

    public static function admin($phone , $message)
    {
        // 10008445
        $url = "https://api.kavenegar.com/v1/" . config('services.kavenegar.token') . "/sms/send.json?receptor=$phone&message=$message&sender=1000100022022";
        return (new Client())->get($url);
    }
}
