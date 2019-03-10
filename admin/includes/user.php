<?php

class User extends Db_object {

	protected static $db_table = "users";
	protected static $db_table_fields = array('usr_username','usr_password','usr_firstname','usr_lastname','usr_pic');
	protected static $pk_field = "usr_id";

	public $usr_id;
	public $usr_username;
	public $usr_password;
	public $usr_firstname;
	public $usr_lastname;
	public $usr_pic;
	public $upload_dir = "images";
	public $image_placeholder = "http://placehold.it/400x400&text=image";


	public function image_path_placehold() {

		return empty($this->usr_pic) ? $this->image_placeholder : $this->upload_dir . DS . $this->usr_pic;
	}
	
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