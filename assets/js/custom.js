$(function() {
	//scrollbar
	$("html").niceScroll({cursorcolor:"#282828"});
	$('#scrollpost').niceScroll({cursorcolor:"#282828"});
	//scroll top
	$("a[href='#top']").click(function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});
});