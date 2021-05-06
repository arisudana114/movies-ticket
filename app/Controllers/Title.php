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
        $titles_model = new \App\Models\TitlesModel;
        $schedules = $titles_model->select('titles.id, title, show_date.show_date, cinema.cinema_name, show_time.show_time')
            ->join('movies', 'titles.id = movies.titles_id', 'inner')
            ->join('show_time', 'show_time.id = movies.show_time_id', 'inner')
            ->join('show_date', 'show_date.id = movies.show_date_id', 'inner')
            ->join('cinema', 'cinema.id = movies.cinema_id', 'inner')
            ->where('titles.id', $id)
            ->findAll();

        // dd($show_dates);
        return view("Title/detail", [
            'titles' => $titles,
            'schedules' => $schedules
        ]);
    }
}
