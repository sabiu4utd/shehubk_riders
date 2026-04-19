<?php namespace App\Models;

use CodeIgniter\Model;

class Location_model extends Model
{
    protected $table      = 'locations';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'location', 'latitude', 'longitude', 'created_at', 'updated_at', 'deleted_at'];   

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
