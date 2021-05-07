<?php

namespace App\Models;

class TicketModel extends \CodeIgniter\Model
{
    protected $table = 'ticket';

    protected $allowedFields = ['pass_key', 'user_id', 'movies_id', 'name'];
}
