<?php

/*
 |
 | Here is the config file for ivers authenticating
 |
*/

return [
    /*
     | This is our site base url
     | Change this if our site's url changed
    */
    'base'=>'http://localhost:8000/',

    /*
     | Your user class namespace
    */
    'user'=>'\App\User',

    /*
     | Column name that storing user's email addresses
    */
    'email_field'=>'email',

    /*
     | Redirecting uri after login success
    */
    'return_uri'=>'/',

    'app_id'=>'auth-project-a',

    'app_secret'=>'somesecret'



];