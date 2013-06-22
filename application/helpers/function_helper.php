<?php
function croatianDate($date)
{
	$croation = array(
		'January' => 'siječnja',
		'February' => 'veljače',
		'March' => 'ožujka',
		'April' => 'travnja',
		'May' => 'svibnja',
		'June' => 'lipnja',
		'July' => 'srpnja',
		'August' => 'kolovoza',
		'September' => 'rujna',
		'October' => 'listopada',
		'November' => 'studenog',
		'December' => 'prosinca'
	);
	
   $fullDate = date('j. ', strtotime($date)) . $croation[date('F', strtotime($date))] . date(' Y. \u G:i', strtotime($date));   
   return $fullDate;
}

function timeAgo($ptime)
{
	$ptime = strtotime($ptime);
	$etime = time() - $ptime;

	if ($etime < 1)
	{
		return '0 seconds';
	}

	$a = array( 12 * 30 * 24 * 60 * 60  =>  'godina',
				30 * 24 * 60 * 60       =>  'mjeseci',
				24 * 60 * 60            =>  'dana',
				60 * 60                 =>  'sati',
				60                      =>  'minuta',
				1                       =>  'sekunda'
				);

	foreach ($a as $secs => $str)
	{
		$d = $etime / $secs;
		if ($d >= 1)
		{
			$r = round($d);
			return 'Prije '. $r . ' ' . $str  /*.($r > 1 ? 'a' : '')*/;
		}
	}
}