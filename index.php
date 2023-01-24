<!doctype html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>rndsht Sluggy</title>
	<meta name="description" content="rndsht Sluggy"> 

	<meta name="keywords" content="slug, slugify, pretty url">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="sluggy.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">

	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">
	<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<meta name="theme-color" content="#ffffff">
	<!--[if lte IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
</head>
	<body>
		<div class="container" style="margin-top: 2em;">
		    <div class="row">
    		    <div class="col-md-2">
    		        <img src="apple-touch-icon.png" />
                </div>
    		    <div class="col-md-10">
    		        <p>I wrote this to convert any string of text into a pretty url, mostly for Wordpress, and given the reslug plugin is problematic with latest Wordpress iterations, I wrote my own quick implementation of <a href="https://developer.wordpress.org/reference/functions/sanitize_text_field/" target="_blank">sanitize_text_field()</a> in juery</p>
        		    <hr>
        			<div class="form-group">
        				<label for="textToConvert">Enter your text to convert</label><input class="form-control form-control-lg" type="text" name="textToConvert" id="textToConvert">
						<div id="convertedText">&nbsp;</div>
        			</div>
		        </div>
		    </div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script>
			jQuery(document).ready(function() {
				jQuery('#textToConvert').keyup(function(){
					if ( jQuery('#textToConvert').val() ) {
						var converted = jQuery('#textToConvert').val();
						// trim the crap
						converted = converted.trim().toLowerCase();
						// remove all non-alphanumerics and replace double - with a single
						converted = converted.replace(/[^A-Za-z0-9]/g, '-').replace(/-+/g, '-');
						if ( converted.trim().length ) {
							jQuery('#convertedText').fadeIn();
						}
						jQuery('#convertedText').text( converted );
					} else {
						jQuery('#convertedText').fadeOut();
					}
				});
			});
			jQuery("#convertedText").click(function(event) {
				event.preventDefault();
				var text = jQuery(this).text();
				if ( text.trim().length ) {
					navigator.clipboard.writeText(text);
					console.log( 'Copied ' + text + ' to clipboard' );
				}
			});
		</script>
	</body> 
</html>
