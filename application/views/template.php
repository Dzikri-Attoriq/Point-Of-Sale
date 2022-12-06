<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="<?= base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    ![endif]-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/sweetalert2/animate.min.css">

    <style>
        .swal2-popup{
            font-size: 1.6rem !important;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
    <div class="wrapper">

        <header class="main-header">
            <a href="#" class="logo">
                <!-- <span class="logo-mini"><b>M</b>P</span> -->
                <img src="<?= base_url('assets/images/logo.jpg'); ?>" alt="" class="logo-mini" width="50" height="50">
                <span class="logo-lg"><b>my</b>POS</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if($this->fungsi->user_login()->image == null) { ?>
                                <img src="<?= base_url().'assets/images/profil/default.jpg'; ?>" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->username; ?></span>
                                <?php }else{ ?>
                                <img src="<?= base_url().'assets/images/profil/'.$this->fungsi->user_login()->image; ?>"
                                    class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->username; ?></span>
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <?php if($this->fungsi->user_login()->image == null) { ?>
                                    <img src="<?= base_url().'assets/images/profil/default.jpg'; ?>" class="img-circle"
                                        alt="User Image">
                                    <?php }else{ ?>
                                    <img src="<?= base_url().'assets/images/profil/'.$this->fungsi->user_login()->image; ?>"
                                        class="img-circle" alt="User Image">
                                    <?php } ?>
                                    <p>
                                        <?= $this->fungsi->user_login()->name; ?>
                                        <small><?= $this->fungsi->user_login()->address; ?></small>
                                        <small class="center hidden-xs" id="clock"></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('profil'); ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/logout')?>"
                                            class="btn btn-default btn-flat bg-red">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar sidebar-dark-primary">
            <section class="sidebar">
                <!-- <div class="user-panel">
                    <div class="pull-left image">
                        <?php if($this->fungsi->user_login()->image == "") { ?>
                        <img src="<?= base_url().'assets/images/profil/default.jpg'; ?>" class="img-circle" alt="User Image">
                        <?php }else{ ?>
                        <img src="<?= base_url().'assets/images/profil/'.$this->fungsi->user_login()->image; ?>"
                            class="img-circle" alt="User Image" width="100" height="100">
                        <?php } ?>
                    </div>
                    <div class="pull-left info">
                        <p><?= ucfirst($this->fungsi->user_login()->name); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div> -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li
                        <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ' '; ?>>
                        <a href="<?= site_url('dashboard')?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : ' '; ?>>
                        <a href="<?= site_url('supplier')?>">
                            <i class="fa fa-truck"></i> <span>Supplier</span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : ' '; ?>>
                        <a href="<?= site_url('customer')?> ">
                            <i class="fa fa-users"></i> <span>Customer</span>
                        </a>
                    </li>
                    <li
                        class="treeview 
                        <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : ' '; ?>">
                        <a href="">
                            <i class="fa fa-archive"></i> <span>Products</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : ' '; ?>>
                                <a href="<?= base_url('category')?>"><i class="fa fa-circle-o"></i> Categories</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : ' '; ?>>
                                <a href="<?= base_url('unit')?>"><i class="fa fa-circle-o"></i> Units</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'item' ? 'class="active"' : ' '; ?>>
                                <a href="<?= base_url('item')?>"><i class="fa fa-circle-o"></i> Items</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="treeview <?= $this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'sale' ? 'active' : ' '; ?>">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'sale' ? 'class="active"' : ''; ?>>
                                <a href="<?= base_url('sale')?>"><i class="fa fa-circle-o"></i> Sales</a>
                            </li>
                            <li
                                <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : ''; ?>>
                                <a href="<?= base_url('stock/in')?>"><i class="fa fa-circle-o"></i> Stock In</a>
                            </li>
                            <li
                                <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : ''; ?>>
                                <a href="<?= base_url('stock/out')?>"><i class="fa fa-circle-o"></i> Stock Out</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview <?= $this->uri->segment(1) == 'report' ? 'active' : ' '; ?>">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i> <span>Reports</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale' ? 'class="active"' : ''; ?>>
                                <a href="<?= base_url('report/sale')?>"><i class="fa fa-circle-o"></i> Sales</a>
                            </li>
                            <li>
                                <a href="<?= base_url('#')?>"><i class="fa fa-circle-o"></i> Stock</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">SETTINGS</li>
                    <li
                        class="treeview <?= $this->uri->segment(1) == 'profil' || $this->uri->segment(1) == 'profil' ? 'active' : ' '; ?>">
                        <a href="#">
                            <i class="fa fa-address-card"></i> <span>Profil</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'profil' ? 'class="active"' : ''; ?>>
                                <a href="<?= base_url('profil')?>"><i class="fa fa-circle-o"></i> My Profil</a>
                            </li>
                            <li
                                <?= $this->uri->segment(1) == 'profil' && $this->uri->segment(2) == 'edit' ? 'class="active"' : ''; ?>>
                                <a href="<?= base_url('profil/edit')?>"><i class="fa fa-circle-o"></i> Edit Profile</a>
                            </li>
                            <li
                                <?= $this->uri->segment(1) == 'profil' && $this->uri->segment(2) == 'changePassword' ? 'class="active"' : ''; ?>>
                                <a href="<?= base_url('profil/changePassword')?>"><i class="fa fa-circle-o"></i> Change Password</a>
                            </li>
                        </ul>
                    </li>
                    <?php if($this->fungsi->user_login()->level == 1 ) { ?>
                    <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : ' '; ?>>
                        <a href="<?= site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></a>
                    </li>
                    <?php } ?>
                </ul>
            </section>
        </aside>

        <script src="<?= base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

        <script src="<?= base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <div class="content-wrapper">
            <?= $contents ?>
        </div>

        <footer class="main-footer text-center">
            <strong>Copyright &copy; <?= date('Y'); ?> <a href="">Dzikri Attoriq</a>
        </footer>
    </div>

    <script src="<?= base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
    
    <script src="<?= base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        var flash = $('#flash').data('flash');
        if(flash) {
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: flash,
              showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutDown'
              }
              // footer: '<a href="">Why do I have this issue?</a>'
            })
        }

        $(document).on('click', '#btn-hapus', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
              title: 'Apakah anda yakin?',
              text: "Tekan Iya untuk menghapus.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Iya, hapus!',
               showClass: {
                popup: 'animate__animated animate__swing'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutDown'
              }
            }).then((result) => {
              if (result.isConfirmed) {
                    window.location = link;
              }
            })
        })
    </script>
    
    <script>
    $(document).ready(function() {
        $('#table1').DataTable()
    })
    </script>
    <script type="text/javascript">
    $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("Selected").html(fileName);
    });

    function showTime() {
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
            'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;

        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        document.getElementById('clock').innerHTML = thisDay + ', ' + day + ' ' + months[
                month] +
            ' ' +
            year + ' ' + curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    </script>
</body>

</html>