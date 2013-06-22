<?php
foreach($result as $row):
?>
<div class="ForumPost">
    <div class="PostTitle">
        <a href="/forum/<?php echo $row->forumId .'/'. $row->forumurl .'/'. $row->id .'/'. $row->url?>"><h4><?php echo $row->theme;?></h4></a>
        <div class="PostDetail">
            <span>piše <a href="/korisnik/<?php echo $row->authorId;?>"><?php echo $row->fullName;?></a></span> / <span><?php echo date('j.n.Y. \u G:i',strtotime($row->date));?></span>
        </div>
    </div>
    <div class="PostNumber">
        <span><?php echo $row->numberResponse;?></span>
    </div>
    <div class="PostLastResponse">
        <span><?php echo $row->lastResponse;?></span>
        <div><span><?php echo $row->lastTime;?></span></div>
    </div>
</div>
<?php endforeach;?>
