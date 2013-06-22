<?php

class CalendarController extends BaseController {

	public function getIndex()
	{
		return View::make('home.index')
			->with('title', 'Kalendar');
	}

}