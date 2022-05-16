<?php

namespace App\Controllers\View;

class Content extends ViewController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->model = model('Content');
    }

	public function page($id) {
        $viewData = [];

        if(is_numeric($id)) {
            $content = $this->model->find($id);
            if(empty($content) || !$content) {
                return $this->response->redirect("/home/main");
            }

			// 조회수 올리기
            $content->view_cnt += 1;
			$this->model->save($content);

            $viewData['content'] = $content;
        }
		return $this->showView('/page', $viewData);
	}

    public function edit($id=null)
    {
        $viewData = [];

        if(is_numeric($id)) {
			$content = $this->model->find($id);
			if(empty($content) || !$content) {
				return $this->response->redirect("/home/main");
        	}
        	$viewData['content'] = $content;
			return $this->showView('/edit', $viewData);
            // return $this->authenticate('edit', $id);
        }
        
        // 글쓰기
        return $this->showView('/edit', $viewData);
    }
    
    public function authenticate($type, $id)
    {
        $viewData = [];

        if($type != 'edit' && $type != 'delete') {
            return $this->response->redirect("/home/main");
        }

        $content = $this->model->find($id);
        $viewData['type'] = $type;
        $viewData['content'] = $content;
        return $this->showView('/authenticate', $viewData);
    }

    public function save($id = null)
    {
        $title = $this->request->getPost('title');
        $text = $this->request->getPost('content');
        $author = $this->request->getPost('author');
        $secret_fl = $this->request->getPost('SECRET_FL');

        if(is_numeric($id)) {
            $content = $this->model->find($id);
        } else {
            $content = new \App\Entities\Content();
        }

        // 글쓰기일 때만
        if(!is_numeric($id)) {
            $email = $this->request->getPost('email');
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            if($author == '') {
                $author = 'Anonymous';
            }
            $content->author = $author;
            $content->password = $password;
        }

        
        $content->title = $title;
        $content->content = $text;
        $content->SECRET_FL = $secret_fl;

        $this->model->save($content);
    }

	public function checkPassword($type, $id)
	{
		$inputPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
		$content = $this->model->find($id);


		if($inputPassword == $content->password) { // 비번 맞음
			$res = [
				'status' => true,
			];
			$resultHttpCode = 200;
			$this->response->setStatusCode($resultHttpCode)->setJSON($res)->send();
			exit;
			// return $this->response->redirect("/home/main");
		} else { // 비번 틀림
			$res = [
				'status' => false,
                'message' => lang('Message.INVALID'),
				'err_code' => 0,
			];
			$this->response->setStatusCode($resultHttpCode)->setJSON($res)->send();
			exit;
            // return $this->edit($id);
		}
	}
}
