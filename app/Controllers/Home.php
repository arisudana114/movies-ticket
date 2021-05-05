<?php

namespace App\Controllers;

// use App\Entities\Titles;

class Home extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new \App\Models\TitlesModel();
	}

	public function index()
	{
		$titles = $this->model->findAll();
		return view('Home/index', [
			'titles' => $titles
		]);
	}

	//--------------------------------------------------------------------

}
