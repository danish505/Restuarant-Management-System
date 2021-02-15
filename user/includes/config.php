<?php 

// $db = new mysqli('localhost','ideanqna_rest','FBwLCUBe)MT1','ideanqna_ras');
 $db = new mysqli('localhost','root','','ras');

if (mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}