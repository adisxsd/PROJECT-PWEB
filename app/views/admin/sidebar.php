<!-- Sidebar -->
<aside class="sidebar" id="mySidebar">
<div class="side-header"> 
    <h5 style="margin-top:10px;">Hello, Admin <?php echo $_SESSION['user_id'] ?></h5>
</div>


<hr style="border:1px solid; background-color:#0000; border-color:#0000;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="?action=homepageadmin" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="?action=viewcustomer"  ><i class="fa fa-users"></i> Customers</a>
    <a href="?action=viewpaket"    ><i class="fa fa-th-large"></i> Paket</a>
    <a href="?action=viewOnGoingorders" ><i class="fa fa-list"></i> Orders</a>
    <a href="?action=PageMerk" ><i class="fa fa-th-large"></i> Merk</a>
</aside>
 
<!-- <div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div> -->


