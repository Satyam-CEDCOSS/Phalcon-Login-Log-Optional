<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        // Redirect to view
    }
    public function checkAction()
    {
        $check = $this->mongo->user->findOne(['$and' => [
            ['email' => $_POST['email']],
            ['password' => $_POST['password']]
        ]]);
        if ($check['_id']) {
            $this->session->set('name', $check['name']);
            $this->logger
                ->excludeAdapters(['error'])
                ->info("Login Successful => Name: " . $check["name"] . " Email: " . $check["email"]);
            $this->response->redirect('/hello');
        } else {
            $this->logger
                ->excludeAdapters(['login'])
                ->error("Authentication Failed => Email: " . $_POST["email"] . " Password: " . $_POST["password"]);
                $this->response->redirect('/');
        }
    }
}
