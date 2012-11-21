jQuery.fn.introHeight = function(){
	if($(this).length > 1){
		$(this).parent().addClass('columnise');
		$firstP = $(this[0]);
		$restP = $(this).slice(1);
		$firstP.wrap('<div class="left" />');
		$restP.wrapAll('<div class="right" />');
	}
};

jQuery.fn.cycleInit = function(){
	if(this.children().size() > 1){	
		$(this).addClass('cycle').after('<nav id="pager">').cycle({
			pager:  '#pager'
		});
	}
};

var apiEndpoint = 'http://vimeo.com/api/v2/';
var videosCallback = 'setupGallery';
var vimeoUsername = '3362379';

$(document).ready(function() {
	$.getScript(apiEndpoint + vimeoUsername + '/videos.json?callback=' + videosCallback);
	$('#header-images').cycleInit();
	$(".page-intro .entry-content p").introHeight();
	
	$('a.lightbox').each(function(){
		if ($(this).attr("href").indexOf('#') !== -1) {
			$(this).colorbox({
				'href': $(this).attr("href").replace('#', ' #'),
				'innerWidth' : 640
			});
		} else {
			$(this).colorbox();
		}
	});
});

function setupGallery(videos) {

	// Add the videos to the gallery
	for (var i = 0; i < 4; i++) {
		var html = '<li class="vimeo clearfix"><a href="http://vimeo.com/' + videos[i].id + '"';
		html += 'class="video clearfix" target="_blank">';
		html += '<div class="img-holder"><img src="' + videos[i].thumbnail_small + '" /></div>';
		html += '<div class="info"><h1 class="vid-title">' + videos[i].title + '</h1>';
		html += '<span class="arrow-link" rel="bookmark">Play Video</span>';

		$('#latest-videos ul').append(html);
	}

	link = '<a href="http://vimeo.com/user3362379" class="arrow-link" rel="bookmark">Plant for Peace on Vimeo</a>';
	$('#latest-videos').append(link);
	
	//jQuery('a.lightbox').colorbox();
    

}