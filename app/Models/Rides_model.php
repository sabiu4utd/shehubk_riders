<?php namespace App\Models;

use CodeIgniter\Model;

class Ride_model extends Model
{
    protected $table = 'rides';
    protected $primaryKey = 'rides_id';

    protected $allowedFields = [ 'rides_id', 'driver_id', 'rider_id', 'pickup', 'destination', 'amount', 'payment_method', 'status', 'distance', 'rating', 'created_at', 'updated_at', 'deleted_at'];

     protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
