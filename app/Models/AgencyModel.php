<?php

namespace App\Models;

use CodeIgniter\Model;

class AgencyModel extends Model
{
    protected $table = 'agencies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'created_at'];
}
