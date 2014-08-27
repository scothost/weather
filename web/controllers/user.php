<?php

class User extends Controller{

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}

	function index() 
	{
        $this->view->title = 'Users';
	    $this->view->userList = $this->model->userList();
		$this->view->render('user/index');
	}

    public function create() 
    {
        $data = array();
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['username'];
        $data['role'] = $_POST['role'];
        
        // @TODO: Do the error checking!
        
        $this->model->create($data);
        header('location: ' . URL . 'user');
    }
    
    public function edit($userid) 
    {
        $this->view->title = 'Edit User';
        $this->view->user = $this->model->userSingleList($userid);
        $this->view->render('user/edit');
    }
    
    public function editSave($userid)
    {
        $data = array();
        $data['userid'] = $userid;
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['username'];
        $data['role'] = $_POST['role'];
        
        // @TODO: Do the error checking!
        
        $this->model->editSave($data);
        header('location: ' . URL . 'user');
    }
    
    public function delete($userid) 
    {
        $this->model->delete($userid);
        header('location: ' . URL . 'user');
    }
}