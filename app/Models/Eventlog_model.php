<?php namespace App\Models;

use CodeIgniter\Model;

class EventLogModel extends Model
{
    protected $table      = 'event_log';
    protected $primaryKey = 'event_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [ 'event_id', 'user_id', 'event', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
