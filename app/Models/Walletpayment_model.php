<?php namespace App\Models;

use CodeIgniter\Model;

class WalletPayment_model extends Model
{
    protected $table      = 'wallet_payment';
    protected $primaryKey = 'wallet_payment_id';

    protected $returnType     = 'array';

    protected $allowedFields = ['wallet_payment_id', 'user_id', 'amount', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}