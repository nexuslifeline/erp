<?php

class categories_model extends CORE_Model{

    protected  $table="categories"; //table name
    protected  $pk_id="category_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_category_list($category_id=null){
        $sql="  SELECT
                  a.*,b.photo_path
                FROM
                  categories as a
                LEFT JOIN
                    category_photos as b
                ON
                  a.category_id=b.category_id
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($category_id==null?"":" AND a.category_id=$category_id")."
            ";
        return $this->db->query($sql)->result();
    }




}




?>