<?php

class User_Controller extends Base_Controller
{
    public function action_authenticate()
    {

        $new_user = Input::get('new_user', 'off');

        $credentials = array(
            'username' => Input::get('email'),
            'password' => Input::get('password')
        ); // <= moverlo para arriba

        
        try {                
            if( $new_user == 'on' ) {
                $user = new User();
                $user->username = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                Auth::login($user);
                return Redirect::to('dashboard/index');
            }
            else {
                if( Auth::attempt($credentials)) {
                    return Redirect::to('dashboard/index');
                } else {
                    echo "Failed to login!";
                }            
            }
            
        }  catch( Exception $e ) {
            echo "Faield to create new user!";
        }
        

    } 

    /*
    |----------------------------------------------------------------
    | Esta es la funcion sin refactorizar. 
    | La idea es refactorizarla y que los tests sigan dando verde
    |
    public function action_authenticate()
    {

        $new_user = Input::get('new_user', 'off');
        if( $new_user == 'on' ) {
            try {
                

                // refactor: credentials y el if para que sea uno. Asi pruebo tests
                $credentials = array(
                    'username' => Input::get('email'),
                    'password' => Input::get('password')
                );
                if( Auth::attempt($credentials)) {
                    return Redirect::to('dashboard/index');
                } else {
                    $user = new User();
                    $user->username = Input::get('email');
                    $user->password = Hash::make(Input::get('password'));
                    $user->save();
                    Auth::login($user);

                    return Redirect::to('dashboard/index');
                } 
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
    */

    public function action_logout()
    {
       Auth::logout();
       return Redirect::to('/');
    }   
}