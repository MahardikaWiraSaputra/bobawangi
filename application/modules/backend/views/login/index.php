<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOGIN : UMKM NAIK KELAS</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/vendors/jquery-toast-plugin/jquery.toast.min.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/umkm/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="<?php echo base_url();?>assets/umkm/images/logo-umkm.png" alt="logo">
                            </div>
                            <form class="pt-3" id="form_login">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent"> 
                                            <span class="input-group-text bg-transparent border-right-0"> <i class="mdi mdi-account-outline text-primary"></i> </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" id="username" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent"> 
                                            <span class="input-group-text bg-transparent border-right-0"> <i class="mdi mdi-lock-outline text-primary"></i> </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" autocomplete="off" placeholder="Password">
                                    </div>
                                </div>
                                <div class="my-3"> 
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="javascript:void(0)" id="submit-login">LOGIN</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">UMKM belum memiliki akun? <a href="#" class="text-primary">Buat Akun</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end pad-tb-20">Copyright &copy; 2021 Pemerintah Kabupaten Banyuwangi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/umkm/js/vendor.bundle.base.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/template.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/settings.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/umkm/vendors/sweetalert/sweetalert2.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/umkm/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
             $('#submit-login').on('click',function(e){
                e.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();

                if (username == '' || password == '') {
                    $.toast({
                      heading: 'LOGIN GAGAL',
                      text: 'Username & Password tidak boleh kosong.',
                      showHideTransition: 'slide',
                      icon: 'warning',
                      loaderBg: '#57c7d4',
                      position: 'top-right'
                    })
                }
                else {
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('backend/login/sign')?>",
                        dataType : "JSON",
                        data : {username: username, password: password},
                        cache : false,
                        success: function(data){
                            if(data.success == true) {
                                $.toast({
                                    heading: 'LOGIN BERHASIL',
                                    text: data.message,
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    loaderBg: '#f96868',
                                    position: 'top-right'
                                })

                                window.location = data.url;
                                setTimeout(function(){
                                    window.location = data.url;
                                }, 3000);
                            }
                            else {

                                $.toast({
                                    heading: 'LOGIN GAGAL',
                                    text: data.message,
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    loaderBg: '#f2a654',
                                    position: 'top-right'
                                })
                            }                       
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>

