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

<style>

.topnav{
    height: 45.5px;
    background-color: #333;
    overflow: hidden;
    z-index: 1;
}
.topnav a, navtitle{
    float: left;
    color: white;
    padding: 10px 15px 20px 15px;
    font-size: 1em;
}
.topnav a:hover{
    background-color: #000;
    color: green;
}

.topnav a:hover, .button:hover{
    transition: all 0.6s ease;
    animation: bounce 1s;
}

.active, .button:hover, .links a.active{
    transition: background-color 0.6s ease;
    background-color: green;
    color: white;
}

a:hover{
  text-decoration: none;
}

.dropdown0{
    position: relative;
    top: -5px;
}

.account{
    background-color: rgba(255,255,255,.4);
    position: absolute;
    right: 0;
    top: 0;
}

.nav-sidelinks{
  color: green;
  background: black;
  height: 45.5px;
  cursor: pointer;
}

.details{
     sbackground: no-repeat 10px 6px #444;
     border: 1px solid black;
     height: 30px;
     color: green;
     width: 180px;
     padding: 6px 15px 6px 15px;
     -webkit-border-radius: 20px;
     -moz-border-radius: 20px;
     border-radius: 10px;
     /*text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
     -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
     -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
     box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset; */
     -webkit-transition: all 0.7s ease 0s;
     -moz-transition: all 0.7s ease 0s;
     -o-transition: all 0.7s ease 0s;
     transition: all 0.7s ease 0s;
}

/*.dropdown0:hover .dropdown-menu, .dropdown1:hover .dropdown-signup,
.dropdown2:hover .dropdown-login, .dropdown3:hover .dropdown-search,
.dropdown0:focus, .dropdown2:focus, .dropdown3:focus, .show{
    display: block;
    transition: all 0.6s ease 0s;
}*/

.dropdown1, .dropdown2, .dropdown3{
    text-align: center;
    position: relative;
    display: inline-block;
    height: 40px;
}

.dropdown-signup, .dropdown-login{
    background-color: rgba(0,0,0,0.3);
    top: 30.4px;
}

.dropdown-search{
  sbackground-color: rgba(0,0,0,0.3);
  top: 10px;
  display: none;
  position: absolute;
  right: 0;
  background-color: #blue;
  dcolor: black;
  z-index: 1000;
}

.dropdown-search .details:focus{
  width: auto;
}


.dropdown-menu, .dropdown-signup, .dropdown-login{
    z-index: 10;
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    background-color: #blue;
    color: white;
}

.dropdown-menu a{
    width: 150px;
    border-top: 1px solid #857D7A;
}

.dropdown-login a{
    padding: 0;
    width: 210px;
}

.drsopdown-search, .dropdown-signup, .dropdown-login{
    padding: 15px 15px;
    margin: 0;
}
</style>

<body>
<div class="topnav">
  <div class="dropdown0">
    <a>&#9776;</a>
    <navtitle><strong> LIBRARY SYSTEM </strong></navtitle>
        <div class="links">
            <ul>
                <li><a href="homepage.php" class="active"> Home </a></li>
                <li><a href="librarian/index.php"> Librarian </a></li>
                <li><a href="books.php"> Books </a></li>
                <li><a href="student.php"> Student </a></li>
                <li><a href="fines.php"> Fines </a></li>
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
            <a id="sign" class="nav-sidelinks" style="color:white;">Sign up</a>
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
            <a class="nav-sidelinks"  style="color:white;"><?php echo "Welcome ".$_SESSION['name']; ?></a>
          <?php } ?>
        </div>
        <div class="dropdown2">
          <?php if (empty($_SESSION['name'])) { ?>
            <a id="log" class="nav-sidelinks" style="color:white;">Login</a>
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
