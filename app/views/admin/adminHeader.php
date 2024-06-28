<?php
//    session_start();
include_once __DIR__ . "/../../config/conn.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5">
    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
    </div>
    <a class="navbar-brand ml-5" href="./index.php">
        <h5 class="homeofshoe" id="homeofshoe" style="color:white">Home Of Shoe</h5>
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <a href="?action=logout" style="text-decoration:none;">
                        <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
        </a>
    </div>  
</nav>
