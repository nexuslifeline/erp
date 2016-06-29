<?php

class supplier_photos_model extends CORE_Model{

    protected  $table="supplier_photos"; //table name
    protected  $pk_id="photo_id"; //primary key id
    protected  $fk_id="supplier_id"; //foreign key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }




}




?>