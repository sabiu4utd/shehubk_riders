<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment_Model extends Model
{
    protected $table      = 'payments';
    protected $primaryKey = 'payment_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['payment_id', 'rider_id', 'driver_id', 'rides_id', 'amount', 'payment_channel'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
