<?php
  include_once "header.php";
?>
    <div class="form">
        <h1>Star Apparels</h1>
        <h2>Register</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" id="fname" name="fname" placeholder="First Name">
        <input type="text" id="lname" name="lname" placeholder="Last Name">
        <input type="text" id="email" name="email" placeholder="Email">
        
        <select id="role" name="role">
            <option value="supervisor">Supervisor</option>
            <option value="employee">Employee</option>
            <option value="manager">Manager</option>
        </select>

        <input type="text" id="uname" name="uid" placeholder="Username">
        <input type="password" id="pwd" name="pwd" placeholder="Password">
        <input type="password" id="rpwd" name="pwdRepeat" placeholder="Re-Enter Password">
        <button name="submit" type="submit">Register</button>
    </form>
    <?php
    if(isset($_GET["error"])){
      if($_GET["error"]=="emptyinput"){
         echo'<div class="error">Fill in the all feilds</div>';
      }elseif($_GET["error"]=="invalidUid"){
          echo'<div class="error">Invalid Username</div>';
      }elseif($_GET["error"]=="invalidEmail"){
          echo'<div class="error">Invalid Email</div>';
      }elseif($_GET["error"]=="passwordDoesNotMatch"){
          echo'<div class="error">Passwords not Matching</div>';
      }elseif($_GET["error"]=="usernameTaken"){
          echo'<div class="error">Username/Email already Exsits</div>';
      }elseif($_GET["error"]=="stmtfaild"){
          echo'<div class="error">Something went wrong</div>';
      }elseif($_GET["error"]=="none"){
          echo'<div class="error">Account Created</div>'; 
      } 
      elseif ($_GET["error"]=="pwdlen") {
        echo'<div class="error">Password must be at least 8 characters long</div>'; 
      }

    }
    ?>

    <P>Already have an Account? <a href="login.php">Login</a></P>
    </div>
    
<?php
  include_once "footer.php";
?>