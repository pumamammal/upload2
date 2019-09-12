<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Roulette</title>
	<link rel="stylesheet" href="css/bootstrap.css"></link>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/ui-lightness/jquery-ui.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css"></link>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/ui-lightness/jquery-ui.css">
	<link rel="stylesheet" href="css/custom.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4876469280300711"
     data-ad-slot="7045554923"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Billboarde -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-4876469280300711"
     data-ad-slot="6485966898"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	<div class="roulette_container" >
	<div class="ball"><img src="img/ball.png"/></div>
		<div class="stick"><img src="img/stick.png"/></div>
		<div class="roulette-1">
			<img src="img/star.png"/>
			<img src="img/flower.png"/>
			<img src="img/coin.png"/>
			<img src="img/mshroom.png"/>
			<img src="img/chomp.png"/>
			<img src="img/random.png"/>
			<img src="img/1.png"/>
			<img src="img/2.png"/>
			<img src="img/3.png"/>
			<img src="img/4.png"/>
			<img src="img/5.png"/>
			<img src="img/6.png"/>
			<img src="img/7.png"/>
			<img src="img/8.png"/>
			<img src="img/9.png"/>
			<img src="img/10.png"/>
			<img src="img/11.png"/>
			<img src="img/12.png"/>
			<img src="img/13.png"/>
			<img src="img/14.png"/>
			<img src="img/15.png"/>
			<img src="img/16.png"/>
			<img src="img/17.png"/>
			<img src="img/18.png"/>
			<img src="img/19.png"/>
			<img src="img/20.png"/>
		</div>
		<div class="roulette-2">
			<img src="img/star.png"/>
			<img src="img/flower.png"/>
			<img src="img/coin.png"/>
			<img src="img/mshroom.png"/>
			<img src="img/chomp.png"/>
			<img src="img/random.png"/>
			<img src="img/1.png"/>
			<img src="img/2.png"/>
			<img src="img/3.png"/>
			<img src="img/4.png"/>
			<img src="img/5.png"/>
			<img src="img/6.png"/>
			<img src="img/7.png"/>
			<img src="img/8.png"/>
			<img src="img/9.png"/>
			<img src="img/10.png"/>
			<img src="img/11.png"/>
			<img src="img/12.png"/>
			<img src="img/13.png"/>
			<img src="img/14.png"/>
			<img src="img/15.png"/>
			<img src="img/16.png"/>
			<img src="img/17.png"/>
			<img src="img/18.png"/>
			<img src="img/19.png"/>
			<img src="img/20.png"/>
		</div>
		<div class="roulette-3">
			<img src="img/star.png"/>
			<img src="img/flower.png"/>
			<img src="img/coin.png"/>
			<img src="img/mshroom.png"/>
			<img src="img/chomp.png"/>
			<img src="img/random.png"/>
			<img src="img/1.png"/>
			<img src="img/2.png"/>
			<img src="img/3.png"/>
			<img src="img/4.png"/>
			<img src="img/5.png"/>
			<img src="img/6.png"/>
			<img src="img/7.png"/>
			<img src="img/8.png"/>
			<img src="img/9.png"/>
			<img src="img/10.png"/>
			<img src="img/11.png"/>
			<img src="img/12.png"/>
			<img src="img/13.png"/>
			<img src="img/14.png"/>
			<img src="img/15.png"/>
			<img src="img/16.png"/>
			<img src="img/17.png"/>
			<img src="img/18.png"/>
			<img src="img/19.png"/>
			<img src="img/20.png"/>
			
		</div>
		<div class="btn_container">
			<p>
			<button class="btn btn-large btn-primary start"> START </button>
			<button class="btn btn-large btn-danger stop"> STOP </button><br>
			<p><strong>OOOOO</strong></p>
			</p>
		</div>
		
	</div>
	<div class="mess_win">
	
		
		<h1 style="color: red;">Congratulations!</h1>
		<p><strong>PLEASE NOTE THAT THIS DOESN'T GUARANTEE YOUR WINNING, WINNERS WILL BE ANOUNCED ON WHATSAPP STATUS</strong></p>
		
		
		<form name="htmlform" method="post" action="message_send.php">
			<span style="color: red; font-size: 20px;">Enter Your Name</span></br>
			<input type="text" size="60" name="name"></br></br>
			<span style="color: red; font-size: 20px;">Enter Your Number</span></br>
			<input type="mobile" size="60" name="number"></br></br>
			<input type="submit" class="btn btn-large btn-primary" value="submit">
			<?php $chek = rand(1,1000); ?>
			<input type="hidden" name="check" value="<?php $chek ?>">
		</form>
		
	</div>
	<div class="mess_no-win">
		
		<h1>Unfortunately you did not win!</h1>
		<p><strong><a class="btn btn-large btn-primary" href="">Click Here</a> To Try Again</strong></p>
		<p></p>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<script src="js/roulette.js"></script>
	<script src="js/scripts.js"></script>

	<div id="container" style="height:100%; position:relative; z-index: -2;">
	<div id="bottom_div" style="height:10%; position:absolute; z-index: -1;  bottom:0px;"/>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Billboarde -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-4876469280300711"
     data-ad-slot="6485966898"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Billboarde -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-4876469280300711"
     data-ad-slot="6485966898"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
   </div>
</div>
	


</body>
</html