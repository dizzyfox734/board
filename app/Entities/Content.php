<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Content extends Entity
{
	protected $datamap = [];
	protected $dates   = [
		'created_dt',
		'deleted_dt',
	];
	protected $casts   = [
	];
}
