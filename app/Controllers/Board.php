<?php

namespace App\Controllers;

class Board extends BaseController
{
    public function edit()
    {
        return view('edit');
    }

	// $no 넣어서 db 
	public function page() {
		return view('page');
	}
}
