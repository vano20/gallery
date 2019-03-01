<?php

class User {

	public $usr_id;
	public $usr_username;
	public $usr_password;
	public $usr_firstname;
	public $usr_lastname;

	//query all from table users
	public static function find_all_users() {
		
		return self::find_this_query("SELECT * FROM users");
	}

	//query user by id
	public static function find_user_by_id($pk_id) {

		$array_result = self::find_this_query("SELECT * FROM users WHERE usr_id = $pk_id LIMIT 1");

		return !empty($array_result) ? array_shift($array_result) : false;
	}

	//query method
	public static function find_this_query($query) {
		global $database;

		$result_query = $database->query_db($query);
		$ob_array = array();

		while($row = mysqli_fetch_array($result_query)) {

			$ob_array[] = self::instance($row);
		}

		return $ob_array;
	}

	public static function instance($data) {
		
		$user_ob = new self;

		foreach($data as $table_column_name=>$value) {
			if($user_ob->has_attribute($table_column_name)) {
				$user_ob->$table_column_name = $value;

			}
		}

        return $user_ob;

	}

	private function has_attribute($string) {
		//getting all prop from object / class
		$ob_prop = get_object_vars($this);

		//checking whether the key existed in the array/object given
		return array_key_exists($string, $ob_prop);
	} 

}

?>