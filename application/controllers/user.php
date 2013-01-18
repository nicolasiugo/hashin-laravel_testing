<?php

class User_Controller extends Base_Controller
{
    public function action_authenticate()
    {

        $new_user = Input::get('new_user', 'off');
        if( $new_user == 'on' ) {
            try {
                $user = new User();
                $user->username = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                Auth::login($user);
                return Redirect::to('dashboard/index');
            }  catch( Exception $e ) {
                echo "Faield to create new user!";
            }
        }
        else {
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

    public function action_logout()
    {
       Auth::logout();
       return Redirect::to('/');
    }   
}