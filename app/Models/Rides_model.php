<?php namespace App\Models;

use CodeIgniter\Model;

class Ride_model extends Model
{
    protected $table      = 'rides';
    protected $primaryKey = 'ride_id';

    protected $allowedFields = [
        'ride_id',
        'rider_id',
        'driver_id',
        'pickup_address',
        'pickup_lat',
        'pickup_lng',
        'destination_address',
        'destination_lat',
        'destination_lng',
        'vehicle_type',
        'number_of_km',
        'amount',
        'surge_multiplier',
        'payment_method',
        'payment_status',
        'status',
        'created_at',
        'updated_at',
        'estimated_arrival_time',
        'actual_pickup_time',
        'dropoff_time',
        'cancellation_reason',
        'cancelled_by',
        'driver_rating',
        'rider_rating'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
