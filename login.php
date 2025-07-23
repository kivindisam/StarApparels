<?php
  include_once "header.php";
?>
    <div class="form">
        <h1>Star Apparels</h1>
        <h2>Login</h2>
    <form action="includes/login.inc.php" method="post" >
        <input type="text" id="fname" name="uid" placeholder="Email  / Username">
        <input type="password" id="lname" name="pwd" placeholder="Password">
        <button name="submit" type="submit">Login</button>
    </form>
    <?php
    if(isset($_GET["error"])){
      if($_GET["error"]=="emptyinput"){
         echo'<div class="error">Fill in the all fields</div>';
      }elseif($_GET["error"]=="wronglogin"){
          echo'<div class="error">Invalid Username or Password</div>';
      }elseif($_GET["error"]=="stmtfaild"){
          echo'<div class="error">Something went wrong</div>';
      }elseif($_GET["error"]=="none"){
          echo'<div class="error">successfully logged in</div>'; 
      }  

    }
    ?>

    <P>New Here ? <a href="signup.php">Register</a></P>
    </div>
    
<?php
  include_once "footer.php";
?>
  