<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		return View::make('home.index')
			->with('title', 'Naslovnica')
			->with('news', News::take(9)->orderBy('date', 'desc')->get());
	}

}