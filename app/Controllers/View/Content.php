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

            $viewData['content'] = $content;
        }
		return $this->showView('/page', $viewData);
	}

    public function edit($id=null)
    {
        $viewData = [];

        if(is_numeric($id)) { // 수정  시 비번 인증
            return $this->authenticate('edit', $id);
        }
        // $content = $this->model->find($id);
        
        // if(empty($content) || !$content) {
        //     return $this->response->redirect("/home/main");
        // }
        // $viewData['content'] = $content;
        
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
}
