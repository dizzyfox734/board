<?php

namespace App\Controllers\View\Ajax;

class Content extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->model = model('Content');
    }

    public function save($id = null)
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $secret_fl = $this->request->getPost('SECRET_FL');

        if(id) {
            $id = $this->request->getPost('id');
            $email = $this->request->getPost('email');
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }
    }
}