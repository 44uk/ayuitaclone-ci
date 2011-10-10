<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_model extends CI_Model {

  public function find_all(){
    $res = $this->db
      ->select( '*' )
      ->get( 'types' );
    return $res->result();
  }

  public function find_by_id( $id ){
    $res = $this->db
      ->select( '*' )
      ->where( 'id', $id )
      ->get( 'types' );
    return $res->row();
  }

  public function get_dropdown() {
    $res = $this->find_all();
    $types = array();
    foreach( $res as $type ){
      $types[ $type->id ] = $type->name;
    }
    return $types;
  }
}
