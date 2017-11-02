<?php
	include 'layout/navbar.php';

	$result =  mysqli_query($con, "select * from book")or die(mysqli_error($con));

	if (!empty($_GET['cat_id'])) {
		$id = $_GET['cat_id'];

		if ($id === 0){
			var_dump($id);
			$_GET['cat_id'] = null;
			unset($_GET['cat_id']);
			header('Location: books.php');
		} else
		$result =  mysqli_query($con, "select * from book where category_id = $id")or die(mysqli_error($con));
	}

	if (isset($_GET['search'])) {
		$search = $_GET['search'];

		$result =  mysqli_query($con, "select * from book where book_title LIKE '%$search%' or author LIKE '%$search%' or book_pub LIKE '%$search%' or publisher_name LIKE '%$search%' or isbn LIKE '%$search%'")or die(mysqli_error($con));
	}
?>
<div class="main">
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
	<form action="">

		<input type="text" name="search" placeholder="Search...">

	</form>
	<span class="s-icon"><img src="images/ic_search_black_48dp.png"height="24px"></span>
</div>
<div style="width: 100%;height: 100vh;">
<div class="mainsection" style="background-color: transparent;">

	  <div><form method="get" action="books.php">
		<select name="cat_id" class="chzn-select" required>
	<?php $result1 =  mysqli_query($con, "select * from category")or die(mysqli_error($con));
			?><option value="0">All</option><?php
		while ($row1=mysqli_fetch_array($result1)){ ?>
			<option value="<?php echo $row1['category_id']; ?>"><?php echo $row1['classname']; ?></option>
		<?php } ?>
		</select>
		<input type="submit"></form>
	</div>

	<?php
	while ($row=mysqli_fetch_array($result)){
		//var_dump($row1[0]);?>

		<div class="card" id="myCard" style="padding-bottom: 10px;">
		  <img style="text-align: center;"id="myImg" src="images/eldest.png" alt="Avatar">
		  <div class="container">
			<h6><b><?php echo $row['book_title']; ?></b></h6>
			<p><?php echo $row['author']; ?></p>
		  </div>
		</div>
	<?php } ?>

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

</div>

<!--</div>-->

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
<footer1>
	<!-- <?php @include 'layout/footer.php'; ?> -->
</footer1>
