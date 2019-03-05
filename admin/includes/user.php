<?php

class User extends Db_object {

	protected static $db_table = "users";
	protected static $db_table_fields = array('usr_username','usr_password','usr_firstname','usr_lastname');
	protected static $pk_field = "usr_id";
	public $usr_id;
	public $usr_username;
	public $usr_password;
	public $usr_firstname;
	public $usr_lastname;

	
	//verify login detail from table user
	public static function verify_user($username, $password) {
		global $database;

		$usr_username = $database->escape_string_query($username);
		$usr_password = $database->escape_string_query($password);

		$sql = "SELECT * FROM " . self::$db_table;
		$add_where = " WHERE usr_username = '{$usr_username}' AND usr_password = '{$usr_password}'";
		$filters = " LIMIT 1";

		$array_result = self::find_by_query($sql . $add_where . $filters);

		return !empty($array_result) ? array_shift($array_result) : false;

	}

} //End of User class

?>