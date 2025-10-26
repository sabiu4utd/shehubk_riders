<?php namespace App\Models;

use CodeIgniter\Model;

class Vehicle_model extends Model
{
    protected $table      = 'vehicles';
    protected $primaryKey = 'vehicle_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [ 'vehicle_id', 'driver_id', 'plate_number', 'year', 'color', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
