<?php

class Comment extends Db_object {

	protected static $db_table = "comments";
	protected static $db_table_fields = array('cmt_photo','cmt_user','cmt_body','cmt_dateadded');
	protected static $pk_field = "cmt_id";

	public $cmt_id;
	public $cmt_photo;
	public $cmt_user;
	public $cmt_body;
	public $cmt_dateadded;

	
} //End of User class

?>