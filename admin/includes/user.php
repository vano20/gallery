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

	//verify login detail from table user
	public static function verify_user($username, $password) {
		global $database;

		$usr_username = $database->escape_string_query($username);
		$usr_password = $database->escape_string_query($password);

		$sql = "SELECT * FROM users";
		$add_where = " WHERE usr_username = '{$usr_username}' AND usr_password = '{$usr_password}'";
		$filters = " LIMIT 1";

		$array_result = self::find_this_query($sql . $add_where . $filters);

		return !empty($array_result) ? array_shift($array_result) : false;

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

	public function create() {
		global $database;

		$insert_query = "INSERT INTO users (usr_username, usr_password, usr_firstname, usr_lastname) ";
		$insert_query .= "VALUES ('" . $database->escape_string_query($this->usr_username) . "', '";
		$insert_query .=  $database->escape_string_query($this->usr_password) . "', '";
		$insert_query .=  $database->escape_string_query($this->usr_firstname) . "', '";
		$insert_query .=  $database->escape_string_query($this->usr_lastname) . "')";

		if($database->query_db($insert_query)) {

			$this->usr_id = $database->inserted_id();
			return true;

		} else {

			return false;

		}
	} //End of create method

	public function update() {
		global $database;

		$update_query = "UPDATE users SET ";
		$update_query .= "usr_username = '" . $database->escape_string_query($this->usr_username) . "', ";
		$update_query .=  "usr_password = '" . $database->escape_string_query($this->usr_password) . "', ";
		$update_query .=  "usr_firstname = '" . $database->escape_string_query($this->usr_firstname) . "', ";
		$update_query .=  "usr_lastname = '" . $database->escape_string_query($this->usr_lastname) . "'";
		$update_query .=  " WHERE usr_id = " . $database->escape_string_query($this->usr_id);

		$database->query_db($update_query);

		return $database->mysql_ob->affected_rows == 1 ? true : false;

	} // End of Update method

	public function delete() {
		global $database;

		$delete_query = "DELETE FROM users WHERE usr_id = " . $database->escape_string_query($this->usr_id);
		$delete_query .= " LIMIT 1";

		$database->query_db($delete_query);

		return $database->mysql_ob->affected_rows == 1 ? true : false;
		
	}

} //End of User class

?>