<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_model extends CI_Model {

  public function find_all(){
    $res = $this->db
      ->select( '*' )
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
