<?php

namespace App\Controllers\View;

class Content extends ViewController
{
    private $model;
    private $comment_model;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->model = model('Content');
        $this->comment_model = model('Comment');
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
            $viewData['commentList'] = $this->getComment($id);
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

        if($type != 'edit' && $type != 'delete' && $type != 'page') {
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
                $author = '홍길동';
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
        $inputPassword = $this->request->getPost('password');
		$content = $this->model->find($id);

        if(password_verify($inputPassword, $content->password)) { // 비번 맞음
			$res = [
				'status' => true,
			];
			$resultHttpCode = 200;
			$this->response->setStatusCode($resultHttpCode)->setJSON($res)->send();
			exit;
		} else { // 비번 틀림
			$res = [
				'status' => false,
				'err_code' => 0,
			];
			$resultHttpCode = 200;
			$this->response->setStatusCode($resultHttpCode)->setJSON($res)->send();
			exit;
		}
	}

    public function delete($id)
    {
        $this->model->delete($id);
        return $this->response->redirect("/home/main");
    }

    public function getComment($contentId)
    {
        $sql = "select id, author, created_dt, content, image_file from COMMENT_TB where main_content_id = ${contentId} and deleted_dt IS NULL;";

        $db = db_connect();
        $list = $db->query($sql)->getResult();

        return $list;
    }
}
