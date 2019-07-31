<?php

/**
* 
*/
class Auth
{
	
	public static function setLoginSession($user, $token, $role)
    {
        $_SESSION['usr'] = [
            'user'  => $user,
            'token' => $token,
            'role'  => $role
        ];   
    }
}