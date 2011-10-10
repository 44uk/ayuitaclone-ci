<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {
  public function index() {
    $this->load->model( 'Item_model' );
    $data = array(
      'items' => $this->Item_model->find_all(),
    );

    $this->load->view( 'items/index', $data ) ;
  }

  public function show( $id ) {
    $this->load->model( 'Item_model' );
    $data = array(
      'item' => $this->Item_model->find_by_id( $id ),
    );

    $this->load->view( 'items/show', $data ) ;
  }

  public function add() {
    $this->load->model( 'Type_model' );
    $data = array(
      'types' => $this->Type_model->get_dropdown(),
    );

    $this->load->view( 'items/add', $data ) ;
  }

  public function confirm() {
    $this->load->model( 'Item_model' );

    $this->form_validation->set_rules(
      $this->Item_model->get_rules()
    );

    if( TRUE === $this->form_validation->run() ){
      $this->load->view( 'items/confirm' ) ;
    }else{
      $this->load->view( 'items/add' ) ;
      //redirect('items/add', 'refresh');
    }
  }

  public function edit( $id ) {

  }

  public function delete( $id ) {

  }
}
