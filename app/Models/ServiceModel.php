<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = ['agency_id', 'type', 'name', 'description', 'price', 'stars', 'created_at'];
}
