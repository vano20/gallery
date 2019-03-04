<?php

class User {

	protected static $db_table = "users";
	protected static $db_table_fields = array('usr_username','usr_password','usr_firstname','usr_lastname');
	public $usr_id;
	public $usr_username;
	public $usr_password;
	public $usr_firstname;
	public $usr_lastname;

	//query all from table users
	public static function find_all_users() {
		
		return self::find_this_query("SELECT * FROM " . self::$db_table);
	}

	//query user by id
	public static function find_user_by_id($pk_id) {

		$array_result = self::find_this_query("SELECT * FROM " . self::$db_table . " WHERE usr_id = $pk_id LIMIT 1");

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

		$sql = "SELECT * FROM " . self::$db_table;
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

	protected function properties() {
		$properties = array();

		foreach (self::$db_table_fields as $key => $value) {
			if (property_exists($this, $value)) {
				$properties[$value] = $this->$value;
			}
		}

		return $properties;

	}

	protected function clean_properties() {
		global $database;

		$clean_properties = array();

		foreach ($this->properties() as $key => $value) {
			
			$clean_properties[$key] = $database->escape_string_query($value);
		}

		return $clean_properties;
	}

	public function save() {

		return isset($this->usr_id) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;

		$properties = $this->clean_properties();

		$insert_query = "INSERT INTO " . self::$db_table . " (" . implode(", ", array_keys($properties)) .")";
		$insert_query .= " VALUES ('" . implode("', '", array_values($properties)) . "')";

		if($database->query_db($insert_query)) {

			$this->usr_id = $database->inserted_id();
			return true;

		} else {

			return false;

		}
	} //End of create method

	public function update() {
		global $database;

		$properties = $this->clean_properties();

		$pairs = array();

		foreach ($properties as $key => $value) {
			$pairs[] = "{$key} = '{$value}'";
		}

		$update_query = "UPDATE " . self::$db_table . " SET ";
		$update_query .= implode(", ", $pairs);
		$update_query .=  " WHERE usr_id = " . $database->escape_string_query($this->usr_id);

		$database->query_db($update_query);

		return $database->mysql_ob->affected_rows == 1 ? true : false;

	} // End of Update method

	public function delete() {
		global $database;

		$delete_query = "DELETE FROM " . self::$db_table . " WHERE usr_id = " . $database->escape_string_query($this->usr_id);
		$delete_query .= " LIMIT 1";

		$database->query_db($delete_query);

		return $database->mysql_ob->affected_rows == 1 ? true : false;
		
	}

} //End of User class

?>