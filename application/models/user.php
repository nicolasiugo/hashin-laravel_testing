<?php

class User extends Aware {
    
    public static $timestamps = true;

    /*public static $rules = array(
		//'username'  => 'required|max:50',
		'email' => 'required|email|unique',
	);*/

	public static function signup( $params_array ) {
		$params_array['password'] = Hash::make($params_array['password']);
		$new_user = new User( $params_array );

		return $new_user->save();
	}

	public function reset_password() {
		// generates a random 7 digits string based on time
		$new_password = substr(md5(date('U')),0,7);
		$this->password = Hash::make($new_password);
		$this->save();

		return $new_password;
	}

}