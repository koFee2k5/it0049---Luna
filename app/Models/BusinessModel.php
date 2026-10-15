<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessModel extends Model
{
    protected $table         = 'businesses';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'business_name',
        'owner_name',
        'permit_number',
        'address',
        'permit_status',
        'expiration_date',
        'created_at',
    ];
    protected $useTimestamps = false;
}
