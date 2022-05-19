<?php

namespace App\Controllers\View;

use CodeIgniter\Files\File;

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
        $comment = new \App\Entities\Comment();

        $text = $this->request->getPost('content');
        $author = $this->request->getPost('author');
        if($author == '') {
            $author = '홍길동';
        }
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        // save image file
        $img = $this->request->getFile('image_file');
        $filename = $img->getRandomName();
        $img->move(WRITEPATH . 'uploads/comment_img', $filename);

        $comment->author = $author;
        $comment->content = $text;
        $comment->image_file = $filename;
        $comment->password = $password;
        $comment->main_content_id = $contentId;

        $this->model->save($comment);
    }

	public function checkPassword($id)
	{
        $inputPassword = $this->request->getPost('password');
		$comment = $this->model->find($id);

        if(password_verify($inputPassword, $comment->password)) { // 비번 맞을 시
            $this->delete($id); // 삭제
			$res = [
				'status' => true,
			];
			$resultHttpCode = 200;
			$this->response->setStatusCode($resultHttpCode)->setJSON($res)->send();
			exit;
		} else { // 비번 틀리면 에러 반환
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
    }
}
