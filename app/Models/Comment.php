<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
	protected $DBGroup = 'default';
    protected $table = 'COMMENT_TB';
    protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'App\Entities\Comment';
	protected $useSoftDeletes = true;
	protected $protectFields = true;

    protected $allowedFields = ['main_content_id', 'content', 'author', 'password'];

    protected $useTimestamps = false;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_dt';
	protected $deletedField = 'deleted_dt';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
