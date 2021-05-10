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
        $titles_model = $this->model;
        $schedules = $titles_model->select('titles.id, title, show_date.show_date, cinema.cinema_name, show_time.show_time, show_time.id')
            ->join('movies', 'titles.id = movies.titles_id', 'inner')
            ->join('show_time', 'show_time.id = movies.show_time_id', 'inner')
            ->join('show_date', 'show_date.id = movies.show_date_id', 'inner')
            ->join('cinema', 'cinema.id = movies.cinema_id', 'inner')
            ->where('titles.id', $id)
            ->orderBy('show_date.show_date', 'ASC')
            ->findAll();

        // dd($schedules);
        return view("Title/detail", [
            'titles' => $titles,
            'schedules' => $schedules
        ]);
    }

    public function seats($id)
    {
        $moviesModel = new \App\Models\MoviesModel;
        $seatsModel = new \App\Models\SeatsModel;
        $show_date = $this->request->getPost("show_date");
        $show_time = $this->request->getPost("show_time");
        $movie_id = $this->request->getPost("movie_id");
        $cinema_name = $this->request->getPost("cinema_name");
        $moviesDate = $moviesModel->select('movies.id, movies.titles_id, show_date.show_date, cinema.cinema_name, show_time.show_time')
            ->join('show_time', 'show_time.id = movies.show_time_id', 'inner')
            ->join('show_date', 'show_date.id = movies.show_date_id', 'inner')
            ->join('cinema', 'cinema.id = movies.cinema_id', 'inner')
            ->where('movies.titles_id', $movie_id)
            ->where('cinema.cinema_name', $cinema_name)
            ->where('show_date.show_date', $show_date)
            ->where('show_time.show_time', $show_time)
            ->first();
        $seats = $seatsModel->findAll();
        // ->where('movies_id', $moviesDate->id)

        // dd($moviesDate);

        return view('Title/seats', [
            'date' => $show_date,
            'time' => $show_time,
            'title' => $movie_id,
            'seats' => $seats,
            'movies' => $moviesDate
        ]);
    }

    public function insertSeats($moviesDate)
    {
        // $seatsInput = new \App\Entities\Seats($this->request->getPost());
        $seatsInput = $this->request->getPost();
        $seatsInput['movies_id'] = $moviesDate;

        // dd($seatsInput);

        $seatsModel = new \App\Models\SeatsModel;

        // $babi = $seatsModel->where('movies_id', $moviesDate)
        //     ->where('seats_code', $seatsInput->seats_code)
        //     ->findAll();
        foreach ($seatsInput['seats_code'] as $input) {
            $seatsModel->insert(
                [
                    'seats_code' => $input,
                    'movies_id' => $moviesDate,
                    'is_taken' => 1
                ]
            );
        }

        // if ($seatsModel->insert($seatsInput)) {
        //     echo "berhasil berhasil berhasil monyet";
        // }

        // if (!isset($babi)) {

        //     $seatsModel->insert($seatsInput);
        //     echo "berhasil";
        // } else {
        //     echo "goblok lu ngentod";
        // }
    }
}
