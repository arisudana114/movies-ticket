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

        return view("Title/detail", [
            'titles' => $titles,
            'schedules' => $schedules
        ]);
    }

    public function seats($id)
    {
        //shows available seats based on which movies, show dates and show times
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
        $seats = $seatsModel->where('movies_id', $moviesDate->id)
            ->findAll();

        return view('Title/seats', [
            'date' => $show_date,
            'time' => $show_time,
            'title' => $movie_id,
            'seats' => $seats,
            'movies' => $moviesDate
        ]);
    }

    public function updateSeats($moviesDate)
    {
        //update seats status (taken or not)
        $seatCodes = $this->request->getPost('seats_code');
        $seatsModel = new \App\Models\SeatsModel;
        foreach ($seatCodes as $seatCode) {
            $seat = $seatsModel->where('movies_id', $moviesDate)->where('seats_code', $seatCode)->first();
            $seat->is_taken = 0;
            $seatsModel->save($seat);
        }

        $user_model = new \App\Models\UserModel;
        $user = $user_model->find(current_user()->id);
        $this->sendActivationEmail($user);
    }

    public function sendActivationEmail($user)
    {
        $email = service('email');

        $email->setTo($user->email);

        $email->setSubject('Pembelian tiket berhasil');

        $message = view('Title/ticket_email', [
            'user' => $user
        ]);

        $email->setMessage($message);

        $email->send();
    }
}
