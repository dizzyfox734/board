<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
		return redirect()->to('/home/firstpage');
        // return view('welcome_message');
    }

    public function firstPage()
    {
	return view('main');
    }
}
