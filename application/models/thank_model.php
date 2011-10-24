<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thank_model extends CI_Model {

  public function find_all( $item_id ){
    $res = $this->db
      ->select( 'thanks.*' )
      ->join( 'items', 'items.id = thanks.item_id' )
      ->where( 'thanks.item_id', $item_id)
      ->get( 'thanks' );
    return $res->result();
  }

  public function create( $data ){
    $this->db->set( 'created_at', 'NOW()', FALSE );
    $res = $this->db->insert( 'thanks', $data );
    return $res;
  }

  public function get_rules(){
    return array(
     array(
       'field'   => 'name',
       'label'   => 'お名前',
       'rules'   => 'required'
      ),
      array(
       'field'   => 'email',
       'label'   => 'メールアドレス',
       'rules'   => 'required|valid_email'
      ),
      array(
       'field'   => 'comment',
       'label'   => '発言',
       'rules'   => 'required|callback_confirm_comment_rows'
      ),
    );
  }
}
