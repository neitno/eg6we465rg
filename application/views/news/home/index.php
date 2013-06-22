<?php 
	$result = $this->NewsModel->homeNews();
	
	foreach($result as $row)
	{
		if($row->category == 'istaknuto')
			$categoryClass = '<li class="featured">';
		elseif($row->category == 'službeno')
			$categoryClass = '<li class="officially">';
		else
			$categoryClass = '<li>';
?>
<?php echo $categoryClass;?>
    <a href="/novosti/<?php echo $row->id;?>/<?php echo $row->url;?>">
        <h4><?php echo $row->title;?></h4>
        <span class="DatePublish"><?php echo croatianDate($row->date);?></span><span class="Category"><?php echo $row->category;?></span>
    </a>
</li>
<?php }?>