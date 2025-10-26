<?php namespace App\Models;

use CodeIgniter\Model;

class Pricing_model extends Model
{
    protected $table      = 'pricing';
    protected $primaryKey = 'pricing_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [ 'pricing_id', 'base_fare', 'per_km', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
