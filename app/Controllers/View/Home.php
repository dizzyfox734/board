<?php

namespace App\Controllers\View;

class Home extends ViewController
{
	private $model;
    private $cmt_model;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->model = model('Content');
        $this->cmt_model = model('Comment');
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
        $viewData['comment_cnt'] = $this->countCmt($list);
        return $this->showView('/main', $viewData);
        // return $this->showView('/main');
    }

	public function countCmt($list) {
        $arr = [];

        $db = db_connect();

        foreach($list as $content) {
            $id = $content->id;
            $sql = "select count(*) as count from COMMENT_TB where main_content_id = ${id};";

            $arr[$id] = $db->query($sql)->getRow()->count;
        }
        return $arr;
	}
}
