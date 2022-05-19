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
        $comment = new \App\Entities\Content();

        $text = $this->request->getPost('content');
        $author = $this->request->getPost('author');
        if($author == '') {
            $author = '홍길동';
        }
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
                
        // $img = $this->request->getFile('image_file');
        // if(!$img->hasMoved()) {
        //     $filepath = WRITEPATH . 'uploads/' . $img->store();

        //     $data = ['uploaded_fileInfo' => new File($filepath)];

        //     return $this->showView('/test', $data);
        // } else {
        //     $data = ['errors' => 'The file has already been moved.'];
        //     return $this->showView('/test', $data);
        // }


        $comment->author = $author;
        $comment->content = $text;
        // $comment->image_file = $img;
        $comment->password = $password;
        $comment->main_content_id = $contentId;

        $this->model->save($comment);
    }

    public function delete($contentId)
    {        
        $this->model->delete($contentId);
        return $this->response->redirect("/home/main");
    }

	public function checkPassword($id)
	{
        $inputPassword = $this->request->getPost('password');
		$comment = $this->model->find($id);

        if(password_verify($inputPassword, $comment->password)) { // 비번 맞음
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
}
