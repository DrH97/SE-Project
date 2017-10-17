<?php
require 'links.php';
include('librarian/dbcon.php');
?>

<body>
<div class="topnav">
  <div class="dropdown0">
    <a>&#9776;</a>
    <navtitle><strong> LIBRARY SYSTEM </strong></navtitle>
        <div class="links">
            <ul>
                <li><a href="homepage.php"class="active"> Home </a></li>
                <li><a href="librarian/index.php"> Librarian </a></li>
                <li><a href="books.php"> Books </a></li>
                <li><a href="Student.php"> Student </a></li>
                <li><a href="fines.php"> Fines </a></li>
            </ul>
        </div>
  </div>
    <div class="account">
        <div class="dropdown3">
            <div class="dropdown-search">
              <a class="nav-sidelinks">&#128269;</a>
                <form method="get" action="?" id="search">
                    <input type="search" class="details" placeholder="Search..."/>
                </form>
            </div>
        </div>
        <div class="dropdown1">
            <a class="nav-sidelinks">Sign up</a>
            <div class="dropdown-signup">
                <form>
                    <input type="email" class="details" placeholder="Your email address" required><br>
                    <br><input type="text" class="details" placeholder="Username" required><br>
                    <br><input type="password" class="details" placeholder="Password" required><br>
                    <br><input type="password" class="details" placeholder="Confirm password" required><br>
                    <br><input type="submit" class="button" value="Submit"><br>
                    <br>Register / Create account.
                </form>
            </div>
        </div>
        <div class="dropdown2">
            <a class="nav-sidelinks">Login</a>
            <div class="dropdown-login">
                <form>
                    <input type="email" class="details" placeholder="Username / Email" required><br>
                    <br><input type="password" class="details" placeholder="Password" required><br>
                    <br><input type="checkbox"> Remember me.<br>
                    <br><input type="submit" class="button" value="Login"><br>
                    <br><a href="">Forgot password?</a>
                </form>
            </div>
        </div>
    </div>
    </div>
<div class="content">
