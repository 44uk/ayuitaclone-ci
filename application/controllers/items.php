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

  public function create() {
    $this->load->model( 'Item_model' );

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
      $this->output->enable_profiler(TRUE);
      $this->load->view( 'items/create' ) ;
    }else{
      $this->add();
    }
  }

  public function edit( $id ) {
    $this->load->model( 'Item_model' );
    $this->load->model( 'Type_model' );

    $data = array(
      'item' => $this->Item_model->find_by_id( $id ),
      'types' => $this->Type_model->get_dropdown(),
    );

    $this->load->view( 'items/edit', $data ) ;
  }

  public function update( $id ) {
    $this->load->model( 'Item_model' );

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
      $this->output->enable_profiler(TRUE);
      $this->load->view( 'items/update' ) ;
    }else{
      $this->add();
    }
  }

  public function delete( $id ) {

  }
}
