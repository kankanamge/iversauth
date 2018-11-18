<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Kankanamge\IversAuth\Helper;

Route::group([
    'middleware'=>'web'
],function(){
    Route::get('/login',function(){
        return Helper::redirectToIversLogin();
    })->middleware('guest')->name('login');
    
    // dd(1);
    Route::get('/login/callback',function(Request $request){
        
        $token = $request->get('token');
        $client = new Client([
            'base_uri'=>config('ivers_auth.base')
        ]);
       
        try{
            // dd($client);
            $response =json_decode($client->request('GET','/api/user',[
                "headers"=>[
                    'Authorization'=>'Bearer '.$token,
                    'Content-Type'=>'application/json',
                    'Accept'=>'application/json',
                ]
            ])->getBody()->getContents());
    
            $email = $response->email;
    
            $userClassNamespace = config('ivers_auth.user');
    
            $user = new $userClassNamespace();
    
            $existsUser = $user::where(config('ivers_auth.email_field'),$email)->first();
    
            if(!$existsUser){
                abort(403);
            }
    
            Auth::loginUsingId($existsUser->getKey(),true);
    
            return redirect()->to(config('ivers_auth.return_uri'));
    
        }catch(\GuzzleHttp\Exception\ClientException $e){
            abort(403);
        }
    });
});

?>