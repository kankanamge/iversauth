<?php

namespace Kankanamge\IversAuth;

class Helper{
    /**
     * Redirecting to ivers login page
     *
     * @return Illumninate\Routing\Redirector
     */
    public static function redirectToIversLogin(){
        $loginURI = rtrim(config('ivers_auth.base'),'/\\').'/auth/login';
        $appSecret = config('ivers_auth.app_secret');
        $appId = config('ivers_auth.app_id');
        $query = http_build_query([
            'app_id'=>$appId,
            'app_secure'=>$appSecret
        ]);
        return redirect()->to($loginURI.'?'.$query);
    }


}