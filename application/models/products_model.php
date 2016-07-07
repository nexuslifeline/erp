<?php

class products_model extends CORE_Model {
    protected  $table="products";
    protected  $pk_id="product_id";

    function __construct() {
        parent::__construct();
    }

    function get_product_list($product_id=null){
        $sql="  SELECT
                  a.*
                FROM
                  products as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($product_id==null?"":" AND a.product_id=$product_id")."
            ";
        return $this->db->query($sql)->result();
    }
}
?>