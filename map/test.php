 <link rel="stylesheet" href="css/sheet.css" type="text/css" />
 <link rel="stylesheet" href="css/sp.css" type="text/css" />
<body>
		<div class="map-block row">
			<div class="sidebar">
		<div class="accordion">
		
			<section id="one">
				<h2><a href="#one">Heading 1</a><span><img src="img/map/red.png"></span></h2>
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
				</div>
			</section>
			
			<section id="two">
				<h2><a href="#two">Heading 2</a></h2>
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
				</div>
			</section>
			
			<section id="three">
				<h2><a href="#three">Heading 3</a></h2>
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
				</div>
			</section>
			
			<section id="four">
				<h2><a href="#four">Heading 4</a></h2>
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>										
				</div>
			</section>
			
			<section id="five">
				<h2><a href="#five">Heading 5</a></h2>
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
				</div>
			</section>
			
		</div>
	</div>
</div>
<!-- BSA AdPacks code -->
<script src="http://code.jquery.com/jquery-latest.js"></script>


<script>
$(document).ready(function(){

	$('.accordion h2').click(function(){
	if( $(this).next().is(':hidden') )
		{
		$('.accordion h2').removeClass('active').next().slideUp();		
		$(this).addClass('active').next().slideDown();
		}
		return false;
	});
});
</script>
</body>