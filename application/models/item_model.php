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
    $data[ 'pw_edit' ] = sha1( $data[ 'pw_edit' ] );
    $this->db->set( 'created_at', 'NOW()', FALSE );
    $res = $this->db->insert( 'items', $data );
    return $res;
  }

  public function update( $data ){
    $data[ 'pw_edit' ] = sha1( $data[ 'pw_edit' ] );
    $this->db->set( 'updated_at', 'NOW()', FALSE );
    $this->db->where( 'id', $data['id'] );
    $res = $this->db->update( 'items', $data );
    return $res;
  }

  public function destroy_by_id( $id ){
    $res = $this->db->delete( 'items', array( 'id' => $id ) );
    return $res;
  }

  public function compare_edit_password( $id, $pw_edit ){
    $res = $this->db->select( 'pw_edit' )
      ->where( 'id', $id )
      ->where( 'pw_edit', sha1( $pw_edit ) )
      ->get( 'items' );
    return 1 === $res->num_rows() ? TRUE : FALSE;
  }

  public function consume_count( $id ){
    $cnt = 1 + $this->db->select( 'dl_count' )->where( 'id', $id )->get( 'items' )->row()->dl_count;
    $this->db->set( 'updated_at', 'NOW()', FALSE );
    $this->db->where( 'id', $id );
    $res = $this->db->update( 'items', array( 'dl_count' => $cnt ) );
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
       'field'   => 'pw_edit',
       'label'   => '編集用パスワード',
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
       'rules'   => 'required|is_natural'
      ),
      array(
       'field'   => 'uri',
       'label'   => '提供品URI',
       'rules'   => 'required'
      ),
      array(
       'field'   => 'force_post',
       'label'   => '強制書き込み要求',
       'rules'   => 'is_natural|less_than[2]'
      ),
      array(
       'field'   => 'dl_limit',
       'label'   => 'ダウンロード制限数',
       'rules'   => 'required|is_natural'
      ),
    );
  }
}