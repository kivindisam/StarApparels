<?php
$serverName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName="starapparels";

$conn=mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}