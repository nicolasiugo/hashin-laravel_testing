<?php

class User_Controller extends Base_Controller
{
    public function action_authenticate()
    {
        $credentials = array(
            'username' => Input::get('email'),
            'password' => Input::get('password')
        );
        if( Auth::attempt($credentials)) {
            return Redirect::to('dashboard/index');
        } else {
            echo "Failed to login!";
        }
    }    
}