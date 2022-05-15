<?php

namespace App\Models;

use CodeIgniter\Model;

class Home extends Model
{
	protected $DBGroup = 'default';
    protected $table = 'BOARD_TB';
    protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'App\Entities\Content';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
    
    protected $allowedFields = ['title', 'content', 'author', 'password', 'email', 'SECRET_FL'];

    protected $useTimestamps = false;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_dt';
	protected $deletedField = 'deleted_dt';
}
