<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UMKM NAIK KELAS</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/select2.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/sweetalert.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/umkm/images/favicon.png" />
    <script type="text/javascript">var site = '<?php echo base_url(); ?>';</script>
    <script src="<?php echo base_url();?>assets/umkm/js/vendor.bundle.base.js"></script>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize"> <span class="mdi mdi-menu"></span>
                </button>
                <a class="navbar-brand brand-logo" href="index.html">
                    <img src="<?php echo base_url();?>assets/umkm/images/logo-umkm.png" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="<?php echo base_url();?>assets/umkm/images/logo-umkm.png" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item d-flex nav-profile dropdown">
                        <a class="nav-link dropdown-toggle border px-1 py-1" href="#" data-toggle="dropdown" id="profileDropdown"> <span class="nav-status-indicator"></span>
                            <img src="<?php echo base_url();?>assets/umkm/images/faces/face28.jpg" alt="profile" /> <span class="nav-profile-name"><?php echo $this->session->userdata('full_name'); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <!-- <a class="dropdown-item"> <i class="mdi mdi-settings text-primary"></i> Settings</a> -->
                            <a class="dropdown-item" href="<?php echo base_url();?>backend/login/logout/"> <i class="mdi mdi-logout text-primary"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"> <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link d-block text-center">
                            <div class="profile-image">
                                <img class="img-sm rounded-circle" src="<?php echo base_url();?>assets/umkm/images/faces/face28.jpg" alt="profile image">
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name">User Superadmin</p>
                                <p class="designation">Superadmin</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" id="mn" onclick="load('backend/main/dashboard','#contents'); switch_menu(this);">
                        <a class="nav-link" href="javascript:void(0)"> <i class="mdi mdi-book-open menu-icon"></i>
                            <span class="menu-title">DASHBOARD</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"> <i class="mdi mdi-palette menu-icon"></i>
                            <span class="menu-title">DATA UMKM</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item" id="mn" onclick="load('backend/umkm','#contents'); switch_menu(this);"> 
                                    <a class="nav-link" href="javascript:void(0)">UMKM Keseluruhan</a>
                                </li>
                                <li class="nav-item" id="mn" onclick="load('backend/umkm_terdaftar','#contents'); switch_menu(this);"> 
                                    <a class="nav-link" href="javascript:void(0)">UMKM Terdaftar</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item" id="mn" onclick="load('backend/toko','#contents'); switch_menu(this);"> 
                        <a class="nav-link" href="javascript:void(0)"> <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">DATA PEDAGANG</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                    <li class="nav-item" id="mn" onclick="load('backend/produk','#contents'); switch_menu(this);"> 
                        <a class="nav-link" href="javascript:void(0)"> <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">DATA PRODUK</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced"> <i class="mdi mdi-layers menu-icon"></i>
                            <span class="menu-title">DATA PENGGUNA</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-advanced">
                            <ul class="nav flex-column sub-menu">
                               <li class="nav-item" id="mn" onclick="load('backend/users','#contents'); switch_menu(this);"> 
                                    <a class="nav-link" href="javascript:void(0)">Pengguna</a>
                                </li>
                                <!--<li class="nav-item" id="mn" onclick="load('backend/main/dashboard','#contents'); switch_menu(this);"> 
                                    <a class="nav-link" href="javascript:void(0)">Group Pengguna</a>
                                </li> -->
                                <li class="nav-item" id="mn" onclick="load('backend/group_permissions','#contents'); switch_menu(this);"> 
                                    <a class="nav-link" href="javascript:void(0)">Hak Akses</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <?php $this->load->view($page);?>
                    <div class="modal fade" id="ajax-modal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="modal_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between"> 
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.banyuwangikab.go.id/" target="_blank">Pemerintah Kabupaten Banyuwangi</a>. All rights reserved.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url();?>assets/umkm/js/jquery.bootpag.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/template.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/settings.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/todolist.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/custom.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/sweetalert2.min.js"></script>
</body>

</html>