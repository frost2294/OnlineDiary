<?php
    session_start(); 
    if(!isset($_SESSION['login'])){
      header('location:index.php');
    }
	
?>

<!DOCTYPE HTML>
<html>
<head>
<script src="sidemenu.js"></script>
<script src="slide.js"></script>
<link rel="stylesheet" type="text/css" href="MenuStyle.css">
<link rel="stylesheet" type="text/css" href="sidemenu.css">
<style>
a:hover{
  color: coral;
  font-weight: bold;
}
</style>
<title>Main Menu</title>
<style>
  html{
    background: url(diarybg2.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
   }
  </style>
</head>

<body>
<div class="slideshow-container">
<div class="mySlides fade">
<div class="Welcometext">Welcome <?php echo $_SESSION['login']?> !</div>
</div>

  <?php 
    include('connection.php');
    $studID = $_SESSION['ID'];
    $username = $_SESSION['login'];
    $query = "SELECT personalQuote from personal_quote WHERE Student_ID = '$studID' AND username = '$username' ORDER BY rand() LIMIT 1";
    $result = mysqli_query($conn,$query);
    $num_rows = mysqli_num_rows($result);
    
      if($num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo "<div class='mySlides fade'>";
          echo "<div class='quotetext'><q>".$row['personalQuote']."</q></div>";
          echo "</div>";
          //echo wordwrap($row["personalNote"],40,"<br>\n",TRUE);
        }
      }
  ?>

</div>
<br>
<div hidden style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

  <br>
  <center>
  <input type="button" name="view" value="View Quotes" onclick="viewQuote()" />
  </center>
 
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href='MainMenu.php'>Home</a>
  <a href='Personal.php'>Personal</a>
  <a href='Studies.php'>Studies</a>
  <a href='Social.php'>Social</a>
  <a href='logout.php'>Log Out</a>
</div>

<br>
<span style="font-size:30px;cursor:pointer;position:absolute;top:80px;" onclick="openNav()">&#9776; Menu</span>
<?php
  include('show_calendar.php');
?>
<h2 align="center"><a href="NewEvent.php">Add an event</a>&emsp;&emsp;OR&emsp;&emsp;<a href="EditEventPersonal.php">View all events</a></h2>


 
</body>
<script type="text/javascript"> function viewQuote() {
  location.href="viewquotes.php";
}

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 6000); // Change image every 6 seconds
}
</script>
</html>