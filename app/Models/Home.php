<?php

namespace App\Models;

use CodeIgniter\Model;

class Home extends Model
{
    protected $table = 'BOARD_TB';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    
    // protected $allowedFields = ['id', 'text'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField  = 'deleted_at';

    public function getPosts()
    {
        return $this->findAll();        
    }

    public function selectAll() {
		$this->select("{$this->table}.*")->where("{$this->table}.deleted_at", null);

		return $this;
	}
}