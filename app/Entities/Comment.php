<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Comment extends Entity
{
	protected $datamap = [];
	protected $dates   = [
		'created_dt',
		'deleted_dt',
	];
	protected $casts   = [
	];
}
