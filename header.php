<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Star Apparels</title>

  <style>
    * {
      margin: 0;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #003153;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #003153;
    }

    .active {
      background-color: #003153;
    }

    body {
      background-color: #E1EBEE;

    }

    /* css for form*/

    input,
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      background-color: #003153;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:ho ver {
      background-color: #003153;
    }

    h2 {
      text-align: left;
      font-size: 25px;
      display: inline-block;
    }

    h1 {
      font-size: 50px;
      color: #060232;
      text-align: center;
      padding-top: 5%;
      padding-bottom: 5%;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      -webkit-text-stroke: 2px white;
    }

    p {
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h3 {
      text-align: left;
      font-size: 22px;
      width: 100%;
      padding: 12px 8px;
      display: inline-block;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;

    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    .error {
      color: red;
      font-size: medium;
      margin-bottom: 5px;

    }
  </style>
</head>

<body>
  <ul>
    <li><a href="index.php">Home </a></li>
    <?php
    if (isset($_SESSION["userfname"]) && (isset($_SESSION["role"]) && $_SESSION["role"] == 'supervisor')) :
      ?>
      <li><a href="landing.php">Menu </a></li>
    <?php endif; ?>
    <!--<li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li-->
    <?php
    if (isset($_SESSION["userfname"])) {
      echo '<li style="float:right"><a href="includes/logout.inc.php">Logout</a></li>';
      echo '<li style="float:right"><a href="profile.php">' . $_SESSION["userfname"] . '</a></li>';
    } else {
      echo '<li style="float:right"><a href="login.php">login </a></li>';
    }
    ?>
  </ul>
  <div class="containeer" style="margin:20px;">