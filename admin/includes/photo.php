<?php

/**
 * Photo class 
 */
class Photo extends Db_object {
	
	protected static $db_table = "photos";
	protected static $db_table_fields = array('pht_title','pht_description','pht_filename','pht_type','pht_size');
	protected static $pk_field = "pht_id";

	public $pht_id;
	public $pht_title;
	public $pht_description;
	public $pht_filename;
	public $pht_type;
	public $pht_size;
	
}


?>