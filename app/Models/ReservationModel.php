<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['service_id', 'client_name', 'client_phone', 'client_email', 'reservation_date', 'created_at'];
}
