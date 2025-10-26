<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'user_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [ 'user_id', 'username', 'password', 'mfactor', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
