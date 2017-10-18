<?php
require 'links.php';
include('librarian/dbcon.php');
session_start();

  if (!empty($_POST)) {
    if(isset($_POST['signup'])){
      $email = $_POST['email'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      //$uname = $_POST['uname'];
      $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
      // $email = $_GET['email'];

      $result = mysqli_query($con, "insert into member (firstname, lastname, email, password)
       values ('$fname','$lname','$email','$pass')")or die(mysqli_error($con));
      //var_dump($result);
    }

    if(isset($_POST['login'])){
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      // $email = $_GET['email'];

      $result =  mysqli_query($con, "select * from member where email = '$email'")or die(mysqli_error($con));
        if ($result) {
          while ($row = mysqli_fetch_array($result)) {
            if(password_verify($pass, $row['password'])){
              $_SESSION['name'] = $row['firstname'] ." ". $row['lastname'];
              //var_dump($_SESSION);
            }
          }
        }
    }
  }

?>

<body>
<div class="topnav">
  <div class="dropdown0">
    <a>&#9776;</a>
    <navtitle><strong> LIBRARY SYSTEM </strong></navtitle>
        <div class="links">
            <ul>
                <li><a href="../homepage.php" class="active"> Home </a></li>
                <li><a href="../librarian/index.php"> Librarian </a></li>
                <li><a href="../books.php"> Books </a></li>
                <li><a href="../student.php"> Student </a></li>
                <li><a href="../fines.php"> Fines </a></li>
            </ul>
        </div>
  </div>
    <div class="account">
        <div class="dropdown3">
          <a id="search" class="nav-sidelinks">&#128269;</a>
            <div class="dropdown-search">
                <form method="get" action="?" id="search">
                    <input id="0" type="search" class="details" placeholder="Search..."/>
                </form>
            </div>
        </div>
        <div class="dropdown1">

          <?php if (empty($_SESSION['name'])) { ?>
            <a id="sign" class="nav-sidelinks">Sign up</a>
            <div id="1" class="dropdown-signup">
                <form method="post">
                    <input name="email" type="email" class="details" placeholder="john@smith.com" required><br>
                    <input name="fname" type="text" class="details" placeholder="John" required><br>
                    <input name="lname" type="text" class="details" placeholder="Smith" required><br>
                    <br><input name="uname" type="text" class="details" placeholder="Username" required><br>
                    <br><input name="pass" type="password" class="details" placeholder="Password" required><br>
                    <br><input type="password" class="details" placeholder="Confirm password" required><br>
                    <br><input name="signup" type="submit" class="button" value="Sign up"><br>
                    <br>Register / Create account.
                </form>
            </div>
          <?php }else { ?>
            <a class="nav-sidelinks"><?php echo "Welcome ".$_SESSION['name']; ?></a>
          <?php } ?>
        </div>
        <div class="dropdown2">
          <?php if (empty($_SESSION['name'])) { ?>
            <a id="log" class="nav-sidelinks">Login</a>
            <div id="2" class="dropdown-login">
                <form method="post">
                    <input name="email" type="email" class="details" placeholder="Email" required><br>
                    <br><input name="pass" type="password" class="details" placeholder="Password" required><br>
                    <br><input name="rem" type="checkbox"> Remember me.<br>
                    <br><input name="login" type="submit" class="button" value="Login"><br>
                    <br><a href="">Forgot password?</a>
                </form>
            </div>
            <?php }else { ?>
              <a class="nav-sidelinks" href="../logout.php">Logout</a>
            <?php } ?>
        </div>
    </div>
    </div>
<div class="content">

  <script>
        // Get the signup and login forms
        var login = document.getElementById('2');
        var signup = document.getElementById('1');
        var search = document.getElementById('0');

        // Get the buttons that open the forms
        var signbtn = document.getElementById("sign");
        var logbtn = document.getElementById("log");
        var searchbtn = document.getElementById("search");
        //
        // // Get the <span> element that closes the modal
        // var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the buttons, open the forms
        signbtn.onclick = function() {
            signup.style.display = "block";
            login.style.display = "none";
        };
        logbtn.onclick = function() {
            login.style.display = "block";
            signup.style.display = "none";
        };
        searchbtn.onclick = function() {
            search.style.display = "block";
        };

        // // When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //     modal.style.display = "none";
        // }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
