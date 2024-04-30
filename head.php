
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<style>
    * {
        padding:0;
        margin:0;}
    header {
        width:100%;
        height: 60px;
        /*font-size:30px;*/
        background: linear-gradient(45deg, #15677b, #167b90, #167b90, #169fb7, #169fb7, #169fb7);
        /*background: linear-gradient(45deg, #15677b, #167b90, #169fb7, #169fb7, #efe62f, #0000);*/
        -webkit-animation: color 2.5s ease-in  0s infinite alternate running;
        -moz-animation: color 2.5s linear  0s infinite alternate running;
        animation: color 2.5s linear  0s infinite alternate running;
        /*z-index:1000;*/
        /*position:fixed;*/
    }

    body {
        font-family: "Lato", sans-serif;
    }
    .menu-bar1 {
        color:#ddd;
        border:2px solid #ddd;
        font-size:25px;
        width:40px;
        height: 43px;
        cursor:pointer;
        text-align:center;
        padding:5px;
        margin-left:10px;
        margin-top:12px;
        margin-bottom:5px;


        /*animation-fill-mode: forwards;*/
    }
    .menu-bar2 {
        color:#ddd;
        font-size:25px ;
        width:40px;
        /*cursor:pointer;*/
        text-align:center;
        /*padding:5px;*/
        margin-left: 1%;
        /* margin-top:5px;
         margin-bottom:5px;*/


        /*animation-fill-mode: forwards;*/
    }
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        display: block;
        /*background-color: #111;*/
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        background: #F5F5F5;
        /*opacity: 0.5;*/
        /*filter: alpha(opacity=50);*/
    }

    .sidenav a {
        padding:10px 20px;
        text-decoration: none;
        font-size: 15px;
        color:#3c8dbc;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: black;
    }

    .sidenav .closebtn {
        position: absolute;
        color: #3c8dbc;
        border:2px solid #3c8dbc;
        font-size:25px;
        width:40px;
        cursor:pointer;
        text-align:center;
        padding:5px;
        margin-left:10px;
        top: 0;
        margin-top:12px;
        margin-bottom:5px;

    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

</style>
<?php if ($_SESSION['akses'] =='1') { ?>
<header>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="fa fa-bars fa-2x menu-bar1"></span>
    <a class="menu-bar2" style="color: white" >Selamat Datang <?php echo $_SESSION['kode']; ?></a>
     <h2 class="text-info" > </h2> 
</header>
<div id="mySidenav" class="sidenav sidenav">
    <a href="javascript:void(0)" class="fa  fa-bars fa-2x closebtn" onclick="closeNav()"></a><br>
    <nav>
        <ul>
            <li><a href="../view/view_pelanggan.php"><i class="fa fa-address-card-o"></i> Data Pergantian Meter</a></li>
            <li><a href="../view/view_data.php"><i class="fa fa-dashboard"></i> Keluhan Pelanggan</a></li>
            <li><a href="../view/view_data_sekarang.php"><i class="fa fa-upload"></i> Data Pelanggan</a></li>
            <li><a href="../view/form_manual.php"><i class="fa fa-user-plus"></i> Input Data </a></li>
            <li><a href="../view/import.php"><i class="fa fa-upload"></i> Import Data</a></li>
            <li><a href="../view/view_user.php"><i class="fa fa-upload"></i> User MEMO</a></li>
            <li><a href="../proses/logout.php"><i  class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
    </nav>
</div>

<?php   
} 
else {
?>
<header>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="fa fa-bars fa-2x menu-bar1"></span>
    <a class="menu-bar2" style="color: white" >Selamat Datang <?php echo $_SESSION['kode']; ?></a>
     <h2 class="text-info" > </h2> 
</header>
<div id="mySidenav" class="sidenav sidenav">
    <a href="javascript:void(0)" class="fa  fa-bars fa-2x closebtn" onclick="closeNav()"></a><br>
    <nav>
        <ul>
            <li><a href="../view/view_pelanggan.php"><i class="fa fa-address-card-o"></i> Data Pergantian Meter</a></li>
            <li><a href="../view/view_data.php"><i class="fa fa-dashboard"></i> Keluhan Pelanggan</a></li>
            <li><a href="../view/view_data_sekarang.php"><i class="fa fa-upload"></i> Data Pelanggan</a></li>
            <li><a href="../proses/logout.php"><i  class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
    </nav>
</div>

<?php  } ?>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

