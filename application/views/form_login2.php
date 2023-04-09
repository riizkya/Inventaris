<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('aset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">


    <!-- MetisMenu CSS -->
    <link href="<?=base_url('aset/bower_components/metisMenu/dist/metisMenu.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url('aset/dist/css/sb-admin-2.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url('aset/bower_components/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style = "background-color : #eee;">

    <div class="container" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silahkan Log-In</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-signin" method="post" accept-charset="utf-8" action="<?php echo site_url().'auth/login';?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="txt_user" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="txt_pass" type="password" value="" required>
                                </div>
                                 
                                            
                                <br>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="btn_submit">Masuk</button>
                        
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <script src="<?php echo base_url()?>aset/js/noty/jquery-1.8.0.js"></script>

<!-- noty -->
    <script  src="<?php echo base_url()?>aset/js/noty/packaged/jquery.noty.packaged.js"></script>

     <script>
        function func1() 
        {
            var notf = <?php echo json_encode($this->session->flashdata('notif')); ?>

            
            if (notf!=null)
            {
                var x = noty({text: ''+notf , type: 'error'});
            }
            
        }
        window.onload=func1;

    </script>

    <!-- jQuery -->
   <script src="<?=base_url('aset/bower_components/jquery/dist/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('aset/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('aset/bower_components/metisMenu/dist/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('aset/dist/js/sb-admin-2.js')?>"></script>

</body>

</html>
