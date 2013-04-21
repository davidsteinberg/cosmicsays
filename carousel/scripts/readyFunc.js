/* readyFunc.js
 * 
*/

// can be used to append a single item or used inside a loop else where
function populateCarousel(set)
{
	// Append items
	$('.jcarousel ul')
		.append('<li>single item</li>');

	// Reload carousel
	$('.jcarousel').jcarousel('reload');
}

// or handing looping here
function populateAll(set)
{
	// Flush carousel
	$('.jcarousel ul').empty();
	var w = window.innerWidth;
	var h = w * 0.60;
	// Loop through url array
	set.forEach (function(s){
		// Append items
		$('.jcarousel ul')
			.append('<li><img src="'+s.FileLocation+s.FileName+'" width="100" height="100" /></li>');
	});
	// Reload carousel
	$('.jcarousel').jcarousel('reload');
}

// uses titles and descriptions
function lightboxDetails(data)
{
}


$(document).ready(function(){

	// Apply carousel formatting and scripts to
	$('.jcarousel').jcarousel({
		// Configuration goes here
	});

	// Controls
	$('.jcarousel-prev').click(function(){
		$('.jcarousel').jcarousel('scroll', '-=1');
	});
	$('.jcarousel-next').click(function(){
		$('.jcarousel').jcarousel('scroll', '+=3');
	});

	// load initial image set?
	// currently hardcoded on the backend to 'suicide' if not specified
	$.getJSON('scripts/jsonData/fetchImages.php', function(data){	
		populateAll(data);
	});

/*
	// load category titles
	$.getJSON('scripts/jsonData/categories.php', function(data){
		data.forEach(function(d){
			var cat = d.categories.replace(/ /g, "-");
			$('#categoryTabs ul')
				.append("<li id='tab_"+cat+"'>"+d.categories+"</li>");
			$('#tab_'+cat).click(function(){
$('#showdata').append("<p>"+cat+"</p>"); //debugging
				$.getJSON(
				'scripts/jsonData/thumbnails.php?category='+d.categories, 
				function(categoryData){
					populateAllThumbnails(categoryData);
				});
			});
*/
/*
			$('#video_'+id).click(function(){
				$.getJSON(
				'scripts/jsonData/details.php?video='+d.id, 
				function(data){
					lightboxDetails(data);
				});
			});
*/
//		});
//	});

// *debugging*
// load default (suicide) here instead of at page load
$('#getdata-button').click(function(){
	//$.getJSON('scripts/jsonData/fetchImages.php', function(data){	
		$('.jcarousel ul').empty();
		$('.jcarousel ul')
			.append('<li>Item 1</li>').append('<li>Item 2</li>')
			.append('<li>Item 3</li>').append('<li>Item 4</li>')
			.append('<li>Item 5</li>').append('<li>Item 6</li>')
			.append('<li>Item 7</li>').append('<li>Item 8</li>')
			.append('<li>Item 9</li>').append('<li>Item 10</li>')
			.append('<li>Item 11</li>').append('<li>Item 12</li>')
			.append('<li>Item 13</li>').append('<li>Item 14</li>')
			.append('<li>Item 15</li>').append('<li>Item 16</li>')
			.append('<li>Item 17</li>').append('<li>Item 18</li>')
			.append('<li>Item 19</li>').append('<li>Item 20</li>');
		$('.jcarousel').jcarousel('reload');
	//});
});

});






/*
	$(window).resize(function(){
		var width = window.innerWidth * 0.77;
		var height = width * 0.50;
		//resizeFrame(width, height);
	});
*/

/*
	$('.categoryTabs ul li').click(function(){
		$.post('scripts/jsonData/thumbnails.php', {variable: this.html()});
		$.getJSON('scripts/jsonData/thumbnails.php', function(data){	
			populateAllThumbnails(data);
		});
	});
*/

/*
			.append('<li>Item 1</li>').append('<li>Item 2</li>')
			.append('<li>Item 3</li>').append('<li>Item 4</li>')
			.append('<li>Item 5</li>').append('<li>Item 6</li>')
			.append('<li>Item 7</li>').append('<li>Item 8</li>')
			.append('<li>Item 9</li>').append('<li>Item 10</li>')
			.append('<li>Item 11</li>').append('<li>Item 12</li>')
			.append('<li>Item 13</li>').append('<li>Item 14</li>')
			.append('<li>Item 15</li>').append('<li>Item 16</li>')
			.append('<li>Item 17</li>').append('<li>Item 18</li>')
			.append('<li>Item 19</li>').append('<li>Item 20</li>');
*/

/*
		<li><img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="100" height="100" alt="" /></li>
		<li><img src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg" width="100" height="100" alt="" /></li>
*/

