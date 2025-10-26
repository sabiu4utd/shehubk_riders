<?php

namespace App\Models;

use CodeIgniter\Model;

class Profile_model extends Model
{
    protected $table      = 'profile';
    protected $primaryKey = 'profile_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [ 'profile_id', 'user_id', 'firstname', 'surname',  'role', 'phone', 'email', 'address', 'dob', 'gender', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
