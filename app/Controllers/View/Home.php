<?php

namespace App\Controllers\View;

class Home extends ViewController
{
    public function index() {
        $this->response->redirect("/home/main");
    }

    public function main()
    {
        return $this->showView('/main');
    }
}
