<?php

class NewsController extends BaseController {

	public function getIndex($id = NULL, $title = '')
	{
		if($id != NULL)
		{
			$news = News::findOrFail($id);
			$title = $news->title;
		}
		else
		{
			$news = News::take(1)->orderBy('date', 'desc')->get();
			$news = $news[0];
			$title = 'Novosti';
		}
		return View::make('news.index')
			->with('title', $title)
			->with('news', $news)
			->with('sidebar', News::take(7)->orderBy('date', 'desc')->get());
	}

}