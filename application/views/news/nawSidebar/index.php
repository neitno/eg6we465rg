<?php 	
	foreach($results as $row)
	{
		if($row->category == 'istaknuto')
			$categoryClass = '<span class="featured">';
		elseif($row->category == 'službeno')
			$categoryClass = '<span class="officially">';
		else
			$categoryClass = '<span class="other">';
?>
<li>
    <a href="/novosti/<?php echo $row->id .'/'. $row->url;?>" data-href="<?php echo $row->id .'/'. $row->url;?>" data-title="<?php echo $row->title;?>">
        <img src="/assets/img/newsDefault.png" />
        <span class="MoreNewsTitle"><?php echo $row->title;?></span>
        <span class="MoreNewsInfo">
            <?php echo $categoryClass.$row->category;?></span>
            <span><?php echo croatianDate($row->date);?></span>
        </span>
    </a>
</li>
<?php }?>


