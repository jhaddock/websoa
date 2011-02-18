 <?php ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="wp-content/themes/SOA-Theme
/css/screen.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="wp-content/themes/SOA-Theme
/css/soa-cover.css" media="screen" rel="stylesheet" type="text/css"/>
	<title>SOA Staff</title>
    <!--[if lt IE 8]><link rel="stylesheet" href="wp-content/themes/SOA-Theme
/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
    <!--[if lt IE 8]><link rel="stylesheet" href="wp-content/themes/SOA-Theme
/css/soa-cover-ie.css" type="text/css" media="screen, projection"><![endif]-->

	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js?ver=3.0.1'></script>
	<script type='text/javascript' src='wp-content/themes/SOA-Theme
/javascripts/jcarousellite1.0.1.js'></script>

<script type='text/javascript'>
	$(document).ready(function(){
		$("#cover .header").jCarouselLite({auto:2500, visible:1});
                $(".content").click(function(){
                    window.location = "state-of-the-art";
                });
	});
</script>

  </head>
  <body>
	<div id="cover">
		<div class="header">
			<ul>
   				<li class="st2">bienvenido</li>
		        <li class="st1">imagen</li>
		        <li class="st2">protocolo</li>
		        <li class="st1">State of the art</li>
		        <li class="st2">eventos</li>
		    </ul>
		</div>
		<div class="content"></div>
		<div class="footer clearfix">
			<div class="logo">
				<a href="state-of-the-art"><img src="wp-content/themes/SOA-Theme
/images/soa-staff-cover.png"/></a>
			</div>
			<div class="contact">
				Julián Romea 5, entreplanta D, 28003 Madrid
			    Teléfono: +34 915 357 651
				info@soastaff.com
			</div>
		</div>
	</div>

  </body>
</html>