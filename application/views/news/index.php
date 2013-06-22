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
		<img src="/assets/img/HeaderNew.png">
	</div>
	<!-- Header Image -->

	<!-- Container -->
	<div class="container NewPost" id="post">
		<div class="row">
			<div class="span8" id="PostSet">
			</div>
			<div class="span4 AllPosts">
				<label>Pretraži</label>
				<input type="text" id="search" class="span4" autocomplete="off" placeholder="Pretraži novosti..."/>
				<span class="PostsDisplay">Najnovije novosti</span>
				<div class="PostMoreScroll" id="scrollpost">
					<ul class="nav nav-list MoreNews" id="defaultView">
                    	
						<button id="ButtonLoad" class="btn loadMore" data-id="1" style="display: none;">Učitaj više postova</button>
					</ul>
                    <ul class="nav nav-list MoreNews" id="searchView">
                      
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Container -->
    
<script src="/assets/js/backbone.min.js"></script>

<script>

$(function(){
	var pageNum = 0;
	$.get('/novosti/pagenumber', function(data) {
		pageNum = data;
		if((pageNum - 7) > 0)
			$('#ButtonLoad').show();
	});
	
	
	$.get('/novosti/sideBar',{page: 1}, function(data) {
		$('#ButtonLoad').before(data);
		$('#ButtonLoad').data('id',2);
		$("#scrollpost").getNiceScroll().resize();
	});
	
	
	$('#ButtonLoad').click(function() {
		var id = $('#ButtonLoad').data('id');
		$.get('/novosti/sideBar',{page: id}, function(data) {
			$('#ButtonLoad').before(data);
			if((pageNum - ((id+1)*7)) <= 0)
				$('#ButtonLoad').hide();
			$('a[data-href="' +$("article").data("url")+ '"]').addClass('newsactive');
			$("#scrollpost").getNiceScroll().resize();
		});
		$('#ButtonLoad').data('id',id+1);	
	});
	
	$('#search').keyup(function() {
		if($('#search').val() == '')
		{
			$('#defaultView').show();
			$('#searchView').hide();
		}
		else
		{
			$('#defaultView').hide();
			$('#searchView').show();
			$.get('/novosti/search',{s: $('#search').val()}, function(data) {
				$('#searchView').html(data);
				$("#scrollpost").getNiceScroll().resize();
				$('a[data-href="' +$("article").data("url")+ '"]').addClass('newsactive');
			});	
		}
	});
});


window.app = {};
window.views = {};
window.routers = {};


(function () {
    views.Post = Backbone.View.extend({
        el: "#post",
        events: {
            "click .MoreNews a": "onNavigationItemClick"
        },
        onNavigationItemClick: function (c) {
            c.preventDefault();
            var a = $(c.currentTarget);
            var b = a.data("href");
            app.router.navigate(b, {
                trigger: true
            })
			
			//document.title = a.data("title") +' | Mioc Zd';
			
        },
		
        showPageSection: function (a) {
			$.get('/novosti/post',{id: a}, function(data) {
			 	$('#PostSet').html(data);
				if(a != 0){
					document.title = $("article").data("title");
					app.router.navigate($("article").data("url"), {
						trigger: true
					});
				}
				$('a').removeClass('newsactive');
				$('a[data-href="' +$("article").data("url")+ '"]').addClass('newsactive');
			});
        }
    });
	
})();
(function () {
    routers.App = Backbone.Router.extend({
        routes: {
			"" : "home",
            ":newsId/:title": "post",
            "*path": "fallback"
        },
		
		
		home: function() {
			app.post.showPageSection(0);
		},
		
        post: function (newsId,title) {				
            app.post.showPageSection(newsId);
        },
        fallback: function () {
            this.navigate("", {
                replace: true,
                trigger: true
            })
        },
    })
})();
(function () {
    $(function () {
        $.ajaxSetup({
            cache: false
        });
        app.router = new routers.App();
        app.post = new views.Post();
        app.post.render();
        Backbone.history.start({
            pushState: true,
            root: "/novosti/"
        })
    })
})();


</script>

<?php $this->load->view('layout/footer');?>