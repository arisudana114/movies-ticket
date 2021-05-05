<?php

namespace App\Controllers;

use App\Entities\Task;

class Title extends BaseController
{

    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\TitlesModel;
    }

    public function index()
    {
        $titles = $this->model->findAll();

        return view('Title/index', [
            'titles' => $titles
        ]);
    }

    public function detail($id)
    {
        $titles = $this->model->find($id);

        return view("Title/detail", [
            'titles' => $titles
        ]);
    }
}
