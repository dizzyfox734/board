<?php

namespace App\Controllers\View;

class Content extends ViewController
{
	// $no 넣어서 db 
	public function page() {
		return $this->showView('/page');
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
