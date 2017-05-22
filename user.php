<?php
class User {

	public static function Usersignup($params){
        return new SignUp($params);
	}

	public static function Userlogin($params){
		return new Login($params);
	}

	public static function Userlogout($params){
		return new Logout($params);
	}

	public static function UserUpload($strategy_id,$params){
		return new Upload($strategy_id,$params);
	}
}


?>