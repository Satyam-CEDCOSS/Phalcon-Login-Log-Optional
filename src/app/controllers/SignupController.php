<?php

use Phalcon\Mvc\Controller;


class SignupController extends Controller
{
    public function indexAction()
    {
        // Redirect to view
    }
    public function addAction()
    {
        $file = $this->mongo->user;
        $arr = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $file->insertOne($arr);
        $this->response->redirect('/');
    }
}
