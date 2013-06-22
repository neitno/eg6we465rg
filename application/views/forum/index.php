<?php
	if($this->session->userdata('logedIn'))
	{
		$user = $this->UserModel->userData($this->session->userdata('id'));
		$header = array('user' => $user);
		$this->load->view('layout/header', $header);
	}
	else
		$this->load->view('layout/header');
?>
<!-- Header Image -->
	<div class="HeaderImage">
		<img src="/assets/img/ForumHeader.png" />
	</div>
<!-- Header Image -->



<!-- Container -->
	<div class="container Forum">
		<div class="row">
			<div class="span4 ForumCategory">
				<ul class="nav nav-list ListCategory">
                    <li class="nav-header">Kategorije</li>
                    <li <?php echo ($this->uri->segment(3) == '' ? 'class="active"' : '');?>><a href="/forum">Forum</a></li>
                    <?php
                    $category = $this->ForumModel->loadCategory();
                    foreach($category as $row):
                    ?>
                    <li <?php echo ($this->uri->segment(3) == strtolower($row->url) ? 'class="active"' : '');?>><a href="/forum/<?php echo $row->id .'/'. $row->url;?>"><?php echo $row->name;?></a></li>
                    <?php endforeach;?>
				</ul>
			</div>
			<div class="span8 ForumPosts">
				<h2 class="ForumHeaderText"><?php echo $title;?></h2>
				<?php if($this->session->userdata('logedIn')):?>
                <button href="#myModal" role="button" data-toggle="modal" class="btn btn-primary pull-right addNewForum">Dodaj novi</button>
                <?php endif;?>

				<div class="ForumTitleBar">
					<div class="TitleBarTitle">
						<span>Tema</span>
					</div>
					<div class="TitleBarNumberResponse">
						<span><i class="icon-comment"></i></span>
					</div>
					<div class="TitleBarLastComent">
						<span>Posljednji odgovor</span>
					</div>
				</div>
				<?php 
					if($single == 1)
						$this->load->view('forum/forumTheme/single');
					else
						$this->load->view('forum/forumTheme/index');
				?>

			</div>
		</div>
	</div>
	<!-- Container -->
<?php if($this->session->userdata('logedIn')):?>
<!-- Forum New -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Dodaj novi</h3>
  </div>
  <div class="modal-body">
    <form action="/forum/addnew" method="post">
    	<label>Unesite Naslov</label>
        <input class="input-block-level" type="text" placeholder="Naslov">
        <label>Kategorija</label>
        <select class="input-block-level">
        		<?php foreach($category as $row):?>
                	<option><?php echo $row->name;?></option>
                <?php endforeach;?>
              </select>
        <label>Sadržaj</label>
        <textarea class="input-block-level" rows="5" placeholder="Naslov"></textarea>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Odustani</button>
    <button class="btn btn-primary">Spremi</button>
  </div>
</div>
<!-- Forum New -->
<?php endif;?>
<?php $this->load->view('layout/footer');?>
