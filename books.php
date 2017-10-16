<?php
	include 'layout/navbar.php';
?>

<div class="slide sparallax slideshow-container">

		<div class="mySlides sfade">
			<div class="numbertext">1 / 3</div>
			<img src="images/lib%201.jpg">
			<div class="text">Caption Text</div>
	  	</div>

		<div class="mySlides sfade">
			<div class="numbertext">2 / 3</div>
			<img src="images/lib%202.jpg">
			<div class="text">Caption Two</div>
		</div>

		<div class="mySlides sfade">
			<div class="numbertext">3 / 3</div>
			<img src="images/lib%203.jpg">
			<div class="text">Caption Three</div>
		</div>

		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>

		<div style="text-align:center; position: absolute;
  top: 2%;">
		  <span class="dot" onclick="currentSlide(1)"></span>
		  <span class="dot" onclick="currentSlide(2)"></span>
		  <span class="dot" onclick="currentSlide(3)"></span>
		</div>
</div>

<div class="searchbar">
	<form action="" >

		<input type="text" name="search" placeholder="Search...">

	</form>
	<span class="s-icon"><img src="images/ic_search_black_48dp.png"height="24px"></span>
</div>

<div class="mainsection">
	<div class="card" id="myCard">
	  <img id="myImg" src="images/eldest.png" alt="Avatar">
	  <div class="container">
		<h4><b>Eldest</b></h4>
		<p>Christopher paolini</p>
	  </div>
	</div>

	<div class="card">
	  <img src="images/brisingr.jpg" alt="Avatar">
	  <div class="container">
		<h4><b>Brisinger</b></h4>
		<p>Christopher Paolini</p>
	  </div>
	</div>

	<div class="card">
	  <img src="images/inheritance.jpg" alt="Avatar">
	  <div class="container">
		<h4><b>Inheritance</b></h4>
		<p>Christopher Paolini</p>
	  </div>
	</div>

	<div class="card">
	  <img src="images/eldest.png" alt="Avatar">
	  <div class="container">
		<h4><b>Eldest</b></h4>
		<p>Christopher paolini</p>
	  </div>
	</div>

	<div class="card">
	  <img src="images/brisingr.jpg" alt="Avatar">
	  <div class="container">
		<h4><b>Brisinger</b></h4>
		<p>Christopher Paolini</p>
	  </div>
	</div>

	<div class="card">
	  <img src="images/inheritance.jpg" alt="Avatar">
	  <div class="container">
		<h4><b>Inheritance</b></h4>
		<p>Christopher Paolini</p>
	  </div>
	</div>

	<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

</div>

<script type="application/javascript">
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
		  dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " active";
	}

</script>

</body>
</html>