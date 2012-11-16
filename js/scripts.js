/*
GET LATEST FROM STOLENRECS VIMEO
*/

var apiEndpoint = 'http://vimeo.com/api/v2/';
var videosCallback = 'setupGallery';
var vimeoUsername = '3362379';

// Get the user's videos
$(document).ready(function() {
	$.getScript(apiEndpoint + vimeoUsername + '/videos.json?callback=' + videosCallback);
	$('#header-images').after('<div id="nav">').cycle({
		pager:  '#nav'
	});
});

function setupGallery(videos) {

	// Add the videos to the gallery
	for (var i = 0; i < 4; i++) {
		var html = '<li class="vimeo"><a href="http://vimeo.com/' + videos[i].id + '"';
		html += 'class="video" target="_blank">';
		html += '<img src="' + videos[i].thumbnail_small + '" class="media-img" />';
		html += '<div class="info"><h3 class="vid-title">' + videos[i].title + '</h3>';
		html += '<span class="arrow-link" rel="bookmark">Play Video</span>';

		$('#latest-videos ul').append(html);
	}

	link = '<a href="http://vimeo.com/user3362379" class="arrow-link" rel="bookmark">Plant for Peace on Vimeo</a>';
	$('#latest-videos').append(link);
	
	//jQuery('a.lightbox').colorbox();
	
	$('a.lightbox').each(function(){
    if ($(this).attr("href").indexOf('#') !== -1) {
        $(this).colorbox({'href': $(this).attr("href").replace('#', ' #')});
    } else {
        $(this).colorbox();
    }
    
});
}