<?php

namespace App\Controllers\View;

class Home extends ViewController
{
	private $model;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->model = model('Content');
    }

    public function index()
	{
        $this->response->redirect("/home/main");
    }

    public function main()
    {
		$viewData = [];

		$list = $this->model->findAll();

		$viewData['list'] = $list;
        return $this->showView('/main', $viewData);
        // return $this->showView('/main');
    }

	private function getList() {
		return $this->model->where('deleted_dt', null)->findAll();
	}
}
