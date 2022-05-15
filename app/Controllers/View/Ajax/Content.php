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
        $text = $this->request->getPost('content');
        $author = $this->request->getPost('author');
        $secret_fl = $this->request->getPost('SECRET_FL');

        alert($title);

        // 글쓰기일 때
        if(!is_numeric($id)) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            if($author == '') {
                $author = 'Anonymous';
            }
        }

        if(is_numeric($id)) {
            $content = $this->model->find($id);
        } else {
            $content = new \App\Entities\Content();
        }

        $content->title = $title;
        $content->content = $text;
        $content->author = $author;
        $content->password = $password;
        $content->SECRET_FL = $secret_fl;

        $this->model->save($content);
    }
}