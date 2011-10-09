<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model {

  public function find_all(){
    $res = $this->db
      ->select( 'items.*, types.name type_name' )
      ->join( 'types', 'items.type = types.id' )
      ->where( 'items.deleted_at IS NULL')
      ->get( 'items' );
    return $res->result();
  }

  public function find_by_id( $id ){
    return $this->db
      ->select( '*' )
      ->where( 'id', $id )
      ->get( 'items' )
      ->row();
  }
}
