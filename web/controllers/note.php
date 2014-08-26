<?php

class Note extends Controller{

	public function __construct() {
        parent::__construct();
		Auth::handleLogin();
	}

	public function index() 
	{
	    $this->view->noteList = $this->model->noteList();
		$this->view->render('note/index');
	}

    public function create() 
    {
        $data = array(
            'title' => $_POST['title'],
            'content' => $_POST['content']
            );
        $this->model->create($data);
        header('location: ' . URL . 'note');
    }
    
    public function edit($noteid) 
    {
        $this->view->note = $this->model->noteSingleList($noteid);
// print_r($this->view->note);
        if (empty($this->view->note)) {
            die('this is an invalid note');
        }
        
        $this->view->render('note/edit');
        // header('location: ' . URL . 'note');
    }
    
    public function editSave($noteid)
    {
        $data = array(
            'noteid' => $noteid,
            'title' => $_POST['title'],
            'content' => $_POST['content']
            );
        $this->model->editSave($data);
        header('location: ' . URL . 'note');
    }
    
    public function delete($id) 
    {
        $this->model->delete($id);
        header('location: ' . URL . 'note');
    }
}