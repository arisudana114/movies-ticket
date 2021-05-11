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

	public function testEmail()
	{
		$email = service('email');

		$email->setTo('arisudana114@gmail.com');

		$email->setSubject('A test email');

		$email->setMessage('<h1>Hello world</h1>');

		if ($email->send()) {
			echo "Message sent";
		} else {
			echo $email->printDebugger();
		}
	}
}
