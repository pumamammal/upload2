<?php
if (isset($_POST["check"])) {
      $check = $_POST["check"];
      $to_email = "info@correctjob.ng";
      $from_email = "noreply@correctbae.ng";
      $name = $_POST["name"];
      $number = $_POST["number"];
      $subject = "$name" . " Thank You for playing";
      $body = "Name: $name </br>
        Mobile Number: $number";
 

?><!doctype html>
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
  <div class="roulette_container2" >

    
    <div align="center" class="">
    
    <h1 style="color: red;">Congratulations!</h1>
    <p><strong>PLEASE NOTE THAT THIS DOESN'T GUARANTEE YOUR WINNING, WINNERS WILL BE ANOUNCED ON WHATSAPP STATUS</strong></p>
    

<?php

            //mail($to_email, $subject, $body);
         if (mail($to_email, $subject, $body, "From: $from_email rn")) {
      echo("<span style='color: red; font-size: 20px;'>Hi $name, </br> Your result has been sent succesfully</br>Thank You for playing</span></br>");
      echo "<p><strong><a class='btn btn-large btn-primary' href='http://naija4u.me'>Play Again</a> </strong></p>"; 

      echo "$body";
      
      } else {
          echo("Email sending failed... </br>");
      }
  
}
else {
 echo "<span style='color: red; font-size: 20px;'>ARE YOU ALRIGHT?</span>" ;
}

?>
    
  </div>

  





  
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
</html>