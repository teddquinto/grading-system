<?php 

$connect = mysqli_connect("localhost", "root", "", "gpils"); 

if (!$connect) {
	echo "Error db connection";
}
