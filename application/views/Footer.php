<div class="bottomBar">
	<div class="container">
		<p>PAKLAND REAL ESTATE COPYRIGHT &copy; 2013</p>
		<ul class="socialIcons">
			<li><a href="#"><img src="<?= base_url("assets/images/icon-fb.png")?>" alt="" /></a></li>
			<li><a href="#"><img src="<?= base_url("assets/images/icon-twitter.png")?>" alt="" /></a></li>
			<li><a href="#"><img src="<?= base_url("assets/images/icon-google.png")?>" alt="" /></a></li>
			<li><a href="#"><img src="<?= base_url("assets/images/icon-rss.png")?>" alt="" /></a></li>
		</ul>
	</div>
</div>

<!-- JavaScript file links -->
<script src="<?= base_url("assets/js/jquery.js")?>"></script>
<script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
<script src="<?= base_url("assets/js/respond.js")?>"></script>
<script src="<?= base_url("assets/js/jquery.bxslider.min.js")?>"></script>
<script src="<?= base_url("assets/js/tabs.js")?>"></script>
<script src="<?= base_url("assets/js/jquery.nouislider.min.js")?>"></script>
<script src="<?= base_url("assets/js/my_ajax.js")?>"></script>
<script src="<?= base_url("assets/js/custom.js")?>"></script>
<?php if( $this->router->class == 'home' || $this->router->class == 'search' ): ?>
<script>

//call bxslider for sub header section
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			auto: true,
			pager: false,
			nextSelector: '.slider-next',
			prevSelector: '.slider-prev',
			nextText: '<img src="assets/images/slider-next.png" alt="slider next" />',
			prevText: '<img src="assets/images/slider-prev.png" alt="slider prev" />'
		});
	});
	var Link = $.noUiSlider.Link;
	$(".priceSlider").noUiSlider({
		range: {
			'min': 0,
			'max': 100000000
		}
		,start: [10000, 550000]
		,step: 1000
		,margin: 100000
		,connect: true
		,direction: 'ltr'
		,orientation: 'horizontal'
		,behaviour: 'tap-drag'
		,serialization: {
			lower: [
				new Link({
					target: $("#price-min")
				})
			],

			upper: [
				new Link({
					target: $("#price-max")
				})
			],
			format: {
				// Set formatting
				decimals: 0,
				thousand: ',',
				postfix: ''
			}
		}
	});

	//    slider crusal
	// Instantiate the Bootstrap carousel
	$('.multi-item-carousel').carousel({
		interval: false
	});

	// for every slide in carousel, copy the next slide's item in the slide.
	// Do the same for the next, next item.
	$('.multi-item-carousel .item').each(function(){
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));

		if (next.next().length>0) {
			next.next().children(':first-child').clone().appendTo($(this));
		} else {
			$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
		}
	});


	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();
	});
</script>
<?php endif; ?>
<!-- single property view slider script-->
<?php if($this->router->class == 'property_view'): ?>
<script>
	$('.bxslider2').bxSlider({
		pagerCustom: '#bx-pager',
		nextSelector: '.slider-next',
		prevSelector: '.slider-prev',
		nextText: '<img src="http://localhost/pakland/assets/images/slider-next2.png" alt="Next" />',
		prevText: '<img src="http://localhost/pakland/assets/images/slider-prev2.png" alt="Previous" />'
	});
</script>
<?php endif;
// if page get error scroll up
if( isset($_SESSION['error_msg']) ){?>
<script>
	$(document).ready(function() {
		// Getting the height of the document
		var n = 660;
		$('html, body').animate({ scrollTop: n }, 1900);
	});
</script>
<?php
}
if( $this->router->class == 'submit_property'){?>
	<script src="<?= base_url("assets/js/image_upload.js")?>"></script>  <!-- my_ajax_requests -->
<?php
}
include_once('panel.php');
 ?>



</body>
</html>


