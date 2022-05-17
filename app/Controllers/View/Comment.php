<?php

namespace App\Controllers\View;

class Comment extends ViewController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->model = model('Comment');
    }

    public function save($contentId)
    {
        $content = new \App\Entities\Content();

        $text = $this->request->getPost('content');
        $author = $this->request->getPost('author');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        
        $content->author = $author;
        $content->content = $text;
        $content->password = $password;
        $content->main_content_id = $contentId;

        $this->model->save($content);
    }
}
