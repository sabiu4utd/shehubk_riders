<?php namespace App\Models;

use CodeIgniter\Model;

class Wallet_model extends Model
{
    protected $table      = 'wallet';
    protected $primaryKey = 'wallet_id';

    protected $allowedFields = ['wallet_id', 'user_id', 'amount', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
