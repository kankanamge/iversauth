<?php
namespace Kankanamge\IversAuth;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
            __DIR__.'/config.php' => config_path('ivers_auth.php'),
        ]);
    }
}