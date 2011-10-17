<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model( 'Item_model' );
    $this->load->model( 'Type_model' );
  }

  public function index() {
    $data = array(
      'items' => $this->Item_model->find_all(),
    );

    $this->load->view( 'items/index', $data );
  }

  public function show( $id ) {
    $this->load->model( 'Thank_model' );
    $data = array(
      'item' => $this->Item_model->find_by_id( $id ),
      'thanks' => $this->Thank_model->find_all( $id ),
    );

    $this->load->view( 'items/show', $data );
  }

  public function add() {
    $data = array(
      'types' => $this->Type_model->get_dropdown(),
    );

    $this->load->view( 'items/add', $data );
  }

  public function create() {
    $this->form_validation->set_rules(
      $this->Item_model->get_rules()
    );

    $data = array(
      'provider_name' => $this->input->post( 'provider_name' ),
      'provider_email' => $this->input->post( 'provider_email' ),
      'pw_edit' => $this->input->post( 'pw_edit' ),
      'name' => $this->input->post( 'name' ),
      'type' => $this->input->post( 'type' ),
      'uri' => $this->input->post( 'uri' ),
      'force_post' => $this->input->post( 'force_post' ),
      'dl_limit' => $this->input->post( 'dl_limit' ),
    );

    if( TRUE === $this->form_validation->run() && $this->Item_model->create( $data ) ){
      $this->output->enable_profiler( TRUE );
      $this->load->view( 'items/create' );
    }else{
      $this->add();
    }
  }

  public function edit() {
    $this->form_validation->set_rules(
      'pw_edit', '編集パスワード', 'required|alpha_numeric|callback_compare_pw_edit'
    );

    if( TRUE === $this->form_validation->run() ){
      $data = array(
        'item' => $this->Item_model->find_by_id( $this->input->post('id') ),
        'types' => $this->Type_model->get_dropdown(),
      );
      $this->load->view( 'items/edit', $data );
    }else{
      $this->show( $this->input->post('id') );
    }
  }

  public function compare_pw_edit( $str ){
    $this->form_validation->set_message('compare_pw_edit', 'Password is not matched.');
    return $this->Item_model->compare_edit_password( $this->input->post('id'), $str );
  }

  public function update() {
    $this->form_validation->set_rules(
      $this->Item_model->get_rules()
    );

    $data = array(
      'id' => $this->input->post('id'),
      'provider_name' => $this->input->post( 'provider_name' ),
      'provider_email' => $this->input->post( 'provider_email' ),
      'pw_edit' => $this->input->post( 'pw_edit' ),
      'name' => $this->input->post( 'name' ),
      'type' => $this->input->post( 'type' ),
      'uri' => $this->input->post( 'uri' ),
      'force_post' => $this->input->post( 'force_post' ),
      'dl_limit' => $this->input->post( 'dl_limit' ),
    );

    if( TRUE === $this->form_validation->run() && $this->Item_model->update( $data ) ){
      $this->load->view( 'items/update' );
    }else{
      $this->add();
    }
  }

  public function destroy( $id ) {
    $this->form_validation->set_rules(
      'pw_edit', '編集パスワード', 'required|alpha_numeric|callback_compare_pw_edit'
    );

    if( TRUE === $this->form_validation->run() && $this->Item_model->destroy_by_id( $id ) ){
      $data = array( 'flash' => '削除成功' );
    }else{
      $data = array( 'flash' => '削除失敗' );
    }
    $this->index();
  }
}
