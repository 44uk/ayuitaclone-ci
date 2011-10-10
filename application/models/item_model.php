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
    $res = $this->db
      ->select( 'items.*, types.name type_name' )
      ->join( 'types', 'items.type = types.id' )
      ->where( 'items.id', $id )
      ->where( 'items.deleted_at IS NULL')
      ->get( 'items' );
    return $res->row();
  }

  public function create( $data ){
    $res = $this->db->insert( 'items', $data );
    return $res;
  }

  public function get_rules(){
    return array(
     array(
       'field'   => 'provider_name',
       'label'   => 'お名前',
       'rules'   => 'required'
      ),
      array(
       'field'   => 'provider_email',
       'label'   => 'メールアドレス',
       'rules'   => 'required|valid_email'
      ),
      array(
       'field'   => 'delete_password',
       'label'   => '削除用パスワード',
       'rules'   => 'required|alpha_numeric'
      ),
      array(
       'field'   => 'name',
       'label'   => '提供品名',
       'rules'   => 'required'
      ),
      array(
       'field'   => 'type',
       'label'   => '提供品種別',
       'rules'   => 'required|is_natural_no_zero'
      ),
      array(
       'field'   => 'uri',
       'label'   => '提供品URI',
       'rules'   => 'required'
      ),
      array(
       'field'   => 'force_post',
       'label'   => '強制書き込み要求',
       'rules'   => 'is_natural_no_zero'
      ),
      array(
       'field'   => 'dl_limit',
       'label'   => 'ダウンロード制限数',
       'rules'   => 'required|is_natural_no_zero'
      ),
    );
  }
}
