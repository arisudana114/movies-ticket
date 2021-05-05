<?php

namespace App\Models;

class MoviesModel extends \CodeIgniter\Model
{
    protected $table = 'movies';

    protected $returnType = 'App\Entities\Movies';

    protected $useTimestamps = true;
}
