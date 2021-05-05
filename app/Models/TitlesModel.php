<?php

namespace App\Models;

class TitlesModel extends \CodeIgniter\Model
{
    protected $table = 'titles';

    protected $allowedFields = ['description'];

    protected $returnType = 'App\Entities\Titles';

    protected $useTimestamps = true;
}
