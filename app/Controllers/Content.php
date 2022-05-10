<?php

namespace App\Controllers;

class Content extends BaseController
{
	// $no 넣어서 db 
	public function page() {
		return view('/page');
	}

    public function edit()
    {
        return view('/edit');
    }
    
    public function authenticate()
    {
        return view('/authenticate');
    }
}
