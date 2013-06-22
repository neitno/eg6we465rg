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
<div class="wrapperGray">
    <div class="container forumSingle">
        <div class="row-fluid">
            <div class="span12 forumPostContent">

                     <div class="row-fluid">
                        <div class="span2 slate hidden-phone text-center">
                            <a href="/korisnik/<?php echo $row->authorId;?>">
                                <img class="avatar margin-bottom img-circle" alt="ronscript" src="<?php echo $row->image;?>" />
                            </a>
                            <small class="muted">
                                <div>
                                    <a href="/korisnik/<?php echo $row->authorId;?>"><?php echo $row->fullName;?></a>
                                </div>
                                <div><?php echo $row->forumResponse > 1 ? ($row->forumResponse .' posta') : ($row->forumResponse .'post');?></div>
                            </small>
                        </div>
                        <div class="span10 slate">
                            <div class="topic-triangle hidden-phone"></div>
                            <h4 class="media-heading"><?php echo $row->theme;?></h4>
                            <p class="muted hidden-phone"><?php echo date('j.n.Y. \u G:i',strtotime($row->date));?></p>
                            <p class="muted visible-phone">
                                <a href="/korisnik/<?php echo $row->authorId;?>"><?php echo $row->fullName;?></a> / <?php echo date('j.n.Y. \u G:i',strtotime($row->date));?>
                            </p>
                            <div class="content break-word bbcode-enabled">
                                <p><?php echo $row->content;?></p>
                            </div>
                        </div> 
                     </div> 
                     
                     <?php foreach($result as $x):?>   
                     
                      <div class="row-fluid">
                        <div class="span2 slate hidden-phone text-center">
                            <a href="/korisnik/<?php echo $x->authorId;?>">
                                <img class="avatar margin-bottom img-circle" alt="ronscript" src="<?php echo $row->image;?>" />
                            </a>
                            <small class="muted">
                                <div>
                                    <a href="/korisnik/<?php echo $x->authorId;?>"><?php echo $x->fullName;?></a>
                                </div>
                                <div <?php if($this->session->userdata('id') == $x->authorId) echo 'id="user"';?>><?php echo $row->forumResponse > 1 ? ($row->forumResponse .' posta') : ($row->forumResponse .'post');?></div>
                            </small>
                        </div>
                        <div class="span10 slate">
                            <div class="topic-triangle hidden-phone"></div>
                            <p class="muted hidden-phone"><?php echo date('j.n.Y. \u G:i',strtotime($x->date));?></p>
                            <p class="muted visible-phone">
                                <a href="/korisnik/<?php echo $x->authorId;?>"><?php echo $x->fullName;?></a> / <?php echo date('j.n.Y. \u G:i',strtotime($x->date));?>
                            </p>
                            <div class="content break-word bbcode-enabled">
                                <?php echo $x->content;?>
                            </div>
                        </div> 
                     </div> 
                   <?php endforeach;?>

                   
                   <?php if($this->session->userdata('logedIn')):?>
                    <div class="row-fluid">
                        <div class="span2 slate hidden-phone text-center">
                            <a href="/korisnik/<?php echo $this->session->userdata('id');?>">
                                <img class="avatar margin-bottom img-circle" alt="ronscript" src="<?php echo $user->image;?>" />
                            </a>
                            <small class="muted">
                                <div>
                                    <a href="/korisnik/<?php echo $this->session->userdata('id');?>"><?php echo $user->fullName;?></a>
                                </div>
                                <div><?php echo $user->forumResponse > 1 ? ($user->forumResponse .' posta') : ($user->forumResponse .'post');?></div>
                            </small>
                        </div>
                        <div class="span10 slate">
                            <div class="topic-triangle hidden-phone"></div>
                            <div class="content break-word bbcode-enabled">
                                <form method="post" action="/<?php echo uri_string();?>">
                                	<input type="hidden" name="themeId" value="<?php echo $this->uri->segment(2);?>"/>
                                    <input type="hidden" name="forumThemeId" value="<?php echo $this->uri->segment(4);?>"/>
                                    <textarea class="input-block-level" name="content" rows="5" placeholder="Unesite poruku"></textarea>
                                    <button class="btn btn-primary" type="submit">Obajavi</button>
                                </form>
                            </div>
                        </div> 
                     </div>
                  <?php endif;?>
                     
            </div>
        </div>
    </div>
</div>
<!-- Container -->
<?php $this->load->view('layout/footer');?>