<?php

namespace App\Controllers\View;

class Content extends ViewController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->model = model('Home');
    }

	// $no 넣어서 db 
	public function page($id) {
        $viewData = [];

        $data = $this->model->find($id);
        $viewData['content'] = $data;
		return $this->showView('/page', $viewData);
	}

    public function edit()
    {
        return $this->showView('/edit');
    }
    
    public function authenticate()
    {
        return $this->showView('/authenticate');
    }
}
