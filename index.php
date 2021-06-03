<?php
session_start();
if (!isset($_SESSION['nama_user'])) {
    header("location:login.php");
}
spl_autoload_register(function($class){
    include "class/".$class.".php";
});
$db = new class_function();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TOKO GROSIR | VAGANZA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- modals CSS
        ============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- accordions CSS
         ============================================ -->
    <link rel="stylesheet" href="css/accordions.css">
    <!-- tabs CSS
        ============================================ -->
    <link rel="stylesheet" href="css/tabs.css">
    <!-- charts C3 CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- select2 CSS
        ============================================ -->
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <!-- chosen CSS
        ============================================ -->
    <link rel="stylesheet" href="css/chosen/bootstrap-chosen.css">
    <!-- notifications CSS
        ============================================ -->
    <link rel="stylesheet" href="css/Lobibox.min.css">
    <link rel="stylesheet" href="css/notifications.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  margin-top: 10%;
  width: 100%;
  color: white;
  text-align: center;
}
</style>
</head>

<body class="materialdesign">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Header top area start-->
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="#"><img src="img/favicon.ico" alt="" />
                    </a>
                    <h3><?php echo $_SESSION['nama_user']; ?></h3>
                    <p>Administrator</p>
                    <strong>VG</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li><a href="?menu=dashboard" style="cursor: pointer;"><i class="fa fa-home"></i><span class="mini-dn"> Dashboard</span></a></li>
                        <li><a href="?menu=barang" style="cursor: pointer;"><i class="fa fa-cubes"></i><span class="mini-dn"> Data Barang</span></a></li>
                        <li><a href="?menu=pembeli" style="cursor: pointer;"><i class="fa fa-users"></i><span class="mini-dn"> Data Pembeli</span></a></li>
                        <li><a href="?menu=transaksi" style="cursor: pointer;"><i class="fa fa-credit-card"></i><span class="mini-dn"> Transaksi Penjualan</span></a></li>
                        <li><a href="?menu=laporan" style="cursor: pointer;"><i class="fa fa-book"></i><span class="mini-dn"> Laporan Penjualan</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="img/logo/log.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <div class="header-top-menu tabl-d-n">
                                    <ul class="nav navbar-nav mai-top-nav">
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <!-- <li class="nav-item dropdown">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="adminpro-icon adminpro-chat-pro"></span><span class="indicator-ms"></span></a>
                                            <div role="menu" class="author-message-top dropdown-menu animated flipInX">
                                                <div class="message-single-top">
                                                    <h1>Message</h1>
                                                </div>
                                                <ul class="message-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="img/message/1.jpg" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                <span class="message-date">16 Sept</span>
                                                                <h2>Advanda Cro</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="message-view">
                                                    <a href="#">View All Messages</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                            <div role="menu" class="notification-author dropdown-menu animated flipInX">
                                                <div class="notification-single-top">
                                                    <h1>Notifications</h1>
                                                </div>
                                                <ul class="notification-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <span class="adminpro-icon adminpro-checked-pro"></span>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Advanda Cro</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="notification-view">
                                                    <a href="#">View All Notification</a>
                                                </div>
                                            </div>
                                        </li> -->
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name"><?php echo $_SESSION['nama_user']; ?></span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li><a href="#"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>My Account</a>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-money author-log-ic"></span>User Billing</a>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Settings</a>
                                                </li>
                                                <li><a href="proses/logout.php"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-tasks"></i></a>

                                            <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated flipInX">
                                                <ul class="nav nav-tabs custon-set-tab">
                                                    <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                    </li>
                                                    <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                    </li>
                                                    <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div id="Notes" class="tab-pane fade in active">
                                                        <div class="notes-area-wrap">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                                <p>You have 10 new message.</p>
                                                            </div>
                                                            <div class="notes-list-area notes-menu-scrollbar">
                                                                <ul class="notes-menu-list">
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="img/notification/5.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Projects" class="tab-pane fade">
                                                        <div class="projects-settings-wrap">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                <p> You have 20 projects. 5 not completed.</p>
                                                            </div>
                                                            <div class="project-st-list-area project-st-menu-scrollbar">
                                                                <ul class="projects-st-menu-list">
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Web Development</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">1 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content">
                                                                                    <p>Completion with: 28%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Settings" class="tab-pane fade">
                                                        <div class="setting-panel-area">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                <p> You have 20 Settings. 5 not completed.</p>
                                                            </div>
                                                            <ul class="setting-panel-list">
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Show notifications</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                    <label class="onoffswitch-label" for="example">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->  
            <?php
            if (isset($_GET['menu'])) {
                $menu=$_GET['menu'];
                switch ($menu) {
                    case 'dashboard':
                        include 'dashboard.php';
                        break;
                    case 'barang':
                        include 'barang.php';
                        break;
                    case 'pembeli':
                        include 'pembeli.php';
                        break;
                    case 'transaksi':
                        include 'transaksi.php';
                        break;
                    case 'laporan':
                        include 'laporan.php';
                        break;
                    default:
                        include 'dashboard.php';
                        break;
                }
            } else {
                include 'dashboard.php';
            }            
            ?>
    <!-- Footer Start-->
    <div class="footer-copyright-area footer-fix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; 2018 Toko Grosir Vaganza. Design by <a href="#">Farlan</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    <!-- <script src="script_loadmenu.js"></script> -->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-2.1.1.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- modal JS
        ============================================ -->
    <script src="js/modal-active.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/Chart.min.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- map JS
		============================================ -->
    <script src="js/map/raphael.min.js"></script>
    <script src="js/map/jquery.mapael.js"></script>
    <script src="js/map/france_departments.js"></script>
    <script src="js/map/world_countries.js"></script>
    <script src="js/map/usa_states.js"></script>
    <script src="js/map/map-active.js"></script>
    <!-- input-mask JS
        ============================================ -->
    <script src="js/input-mask/jasny-bootstrap.min.js"></script>
    <!-- chosen JS
        ============================================ -->
    <script src="js/chosen/chosen.jquery.js"></script>
    <script src="js/chosen/chosen-active.js"></script>
    <!-- select2 JS
        ============================================ -->
    <script src="js/select2/select2.full.min.js"></script>
    <script src="js/select2/select2-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- notification JS
        ============================================ -->
    <script src="js/Lobibox.js"></script>
    <script src="js/notification-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <?php
    if (isset($_GET['success'])) {
    ?>
        <script type="text/javascript">
            Lobibox.notify('success', {
                msg: 'Data Berhasil Ditambahkan.'
            });
        </script>
    <?php
    } elseif(isset($_GET['failed'])) {
    ?>
        <script type="text/javascript">
            Lobibox.notify('error', {
                msg: 'Data Gagal Ditambahkan.'
            });
        </script>
    <?php
    } else {}
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            //edit data barang
            $('#data_barang').editable({
                container: 'body',
                selector: 'td.nama_barang',
                url: "update.php?aksi=barang",
                title: 'Nama Barang',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#data_barang').editable({
                container: 'body',
                selector: 'td.jenis',
                url: "update.php?aksi=barang",
                title: 'Jenis',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#data_barang').editable({
                container: 'body',
                selector: 'td.jumlah',
                url: "update.php?aksi=barang",
                title: 'Jumlah Barang',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#data_barang').editable({
                container: 'body',
                selector: 'td.hrg_beli',
                url: "update.php?aksi=barang",
                title: 'Harga Beli',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#data_barang').editable({
                container: 'body',
                selector: 'td.hrg_jual',
                url: "update.php?aksi=barang",
                title: 'Harga Jual',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            //edit data pembeli
            $('#data_pembeli').editable({
                container: 'body',
                selector: 'td.nama_pembeli',
                url: "update.php?aksi=pembeli",
                title: 'Nama Pembeli',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#data_pembeli').editable({
                container: 'body',
                selector: 'td.alamat',
                url: "update.php?aksi=pembeli",
                title: 'Alamat Pembeli',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });

            $('#data_pembeli').editable({
                container: 'body',
                selector: 'td.no_telp',
                url: "update.php?aksi=pembeli",
                title: 'No. Telp. Pembeli',
                type: "POST",
                //dataType: 'json',
                validate: function(value){
                    if($.trim(value) == '') {
                        return 'This field is required';
                    }
                }
            });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            //cart
            var row = document.getElementById("brg").rows.length;
            for(var i = 0; i <= row; i++){
                count = 0;
                $("#insert_to_cart"+i).click(function(){
                    var no = $(this).data("id");
                    count+=1;
                    var kd = $("#kd"+no).val();
                    var data = $('#insert-to-cart').serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'proses/proses.php?aksi=cart&kd_barang='+kd,
                        data: data,
                        success: function(){
                            $('#show_cart').load('proses/cart.php');
                        }
                    });
                });
            }

            // $("#hapus").click(function() {
            //     var nilai = $("#kode").val();
            //     alert(nilai);
            // });

            // $('.hapus').click(function(){
            //     var hps = $(this).attr('id');
            //     console.log(hps);
            //     $.ajax({
            //         type:'POST',
            //         url:'proses/proses.php?aksi=hapuscart&kd='+hps,
            //         data: data,
            //         success: function(){
            //             $('#show_cart').load('proses/cart.php');
            //         }
            //     });
            // });
        })
    </script>
</body>

</html>