<?php @include 'layout/navbar.php'; ?>

<style type="text/css">
	.jumbotron {
		background-color: #00CC00;

	}
</style>
</header>
<style>
<boy78dy>
</style>

<div class="jumbotron">
	<h1> STUDENT</h1>
</div>



<form name="student" action="form.php" method="POST">


<fieldset>

<legend>STUDENT'S REGISTER FORM
</legend>
<iframe height="200" width="250"></iframe><br><br>

<label>Name:<br><input type="text" name="name" value="" placeholder="Enter name" size="35" required></label><br><br>
<label>Student No.:<br><input type="text" name="student_no" value="" placeholder="Enter student number" size="35" required></label><br><br>
<label>Course:<br><input type="text" name="course" value="" placeholder="Enter course" size="35" required></label><br><br>
<label>Date:<br><input type="date" name="Collection_date" value="" required></label><br><br>
<input type="submit">
<input type="reset">


</fieldset>
</form>


<?php @include 'layout/footer.php'; ?>
