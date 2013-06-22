<?php

class ForumController extends BaseController {

	public function getIndex()
	{
		return View::make('home.index')
			->with('title', 'Forum');
	}

}