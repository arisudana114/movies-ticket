<?php

namespace App\Models;

class SeatsModel extends \CodeIgniter\Model
{
    protected $table = 'seats';

    protected $returnType = 'App\Entities\Seats';

    protected $allowedFields = ['seats_code', 'movies_id', 'is_taken'];

    // protected $useTimestamps = true;
}
