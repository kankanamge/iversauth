<?php
namespace Kankanamge\IversAuth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Kankanamge\IversAuth\Helper;

class AuthenticateMiddleware extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
         if (! $request->expectsJson()) {
            $loginURI = rtrim(config('ivers_auth.base'),'/\\').'/auth/login';
            $appSecret = config('ivers_auth.app_secret');
            $appId = config('ivers_auth.app_id');
            $query = http_build_query([
                'app_id'=>$appId,
                'app_secure'=>$appSecret
            ]);
            return $loginURI.'?'.$query;
         }
    }
}