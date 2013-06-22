<?php
	if($row->category == 'izdvojeno')
		$span = '<span class="Category featured">';
	elseif($row->category == 'službeno')
		$span = '<span class="Category officially">';
	else
		$span = '<span class="Category">';
?>
<article class="NewPostArticle" data-title="<?php echo $row->title;?>" data-url="<?php echo $row->id .'/'. $row->url;?>">
<h1 class="NewPostTitle"><?php echo $row->title;?></h1>
<!--<h4 class="NewPostTitle"> 
  <hr> 
  <span class="NewTextTitle">
    <span> Moje ime je medvjedić lino </span>
  </span> 
</h4>-->
<?php echo $span.$row->category;?></span>
<span class="Date"><?php echo croatianDate($row->date);?></span>
<div class="NewPostContent">
    <!--<img src="/assets/http://cdn0.mos.techradar.futurecdn.net///art/software/Windows/Windows%20Blue/homescreen-900-75.jpg"/>-->
    <?php echo $row->content;?>
</div>
</article>