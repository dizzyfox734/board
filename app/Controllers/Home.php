<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
	#return redirect()->to('/home/main');
        return view('welcome_message');
    }

    public function main()
    {
	return view('main');
    }
}
