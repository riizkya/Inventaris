<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Utama</title>
    <script src="<?php echo base_url()?>aset/js/noty/jquery-1.8.0.js"></script>

<!-- noty -->
    <script  src="<?php echo base_url()?>aset/js/noty/packaged/jquery.noty.packaged.js"></script>


    <link href= "<?php echo base_url()?>aset/assets_chart/css/bootstrap.css" rel="stylesheet" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>aset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>aset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url()?>aset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url()?>aset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>aset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>aset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url()?>aset/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

    <div id="wrapper" >

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="<?php echo base_url()?>dashboard">INVENTARIS DIVISI IT TVKU</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                     <dt>Selamat Datang , <?php echo $_SESSION['username'] ?></dt>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown" >
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url()?>manajer_user/view_profile"><i class="fa fa-user fa-fw"></i> Profil Akun</a>
                        </li>

                        <?php 
                            if ($_SESSION['privilege']==1)
                            {
                                echo " <li><a href= \"".base_url()."manajer_user\"><i class=\"fa fa-key fa-fw\"></i> Manajemen Akun</a>
                                </li>";

                               
                            }
                             echo " <li><a href= \"".base_url()."manajer_setting\" onclick = \" set_date_off()\"><i class=\"fa fa-gear fa-fw\"></i> Pengaturan</a>
                                </li>";
                         ?>
                       
                        
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()?>auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->

                
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" >
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="<?php echo base_url()?>dashboard"><i class="fa fa-home fa-fw"></i> Halaman Depan</a>
                        </li>

                       <?php  
                            if ($_SESSION['privilege']==1)
                            {
                                 $this->load->view('nav_bar/nav_bar_manajemen_data');
                                $this->load->view('nav_bar/nav_bar_proses_data');
                               
                            }

                            $this->load->view('nav_bar/nav_bar_show_barang');
                            $this->load->view('nav_bar/nav_bar_show_proses');
                            if ($_SESSION['privilege']==1)
                            {
                                  $this->load->view('nav_bar/nav_bar_show_history');
                               
                            }

                            $this->load->view('nav_bar/nav_bar_cetak_laporan');
                            
                            if ($_SESSION['privilege']==1)
                            {
                                  $this->load->view('nav_bar/nav_bar_help');
                               
                            }
                       ?>
                        

                    

                       
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           <?php $this->load->view($konten); ?>
          
          
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="<?php echo base_url()?>aset/assets_chart/js/Chart.js"></script>
    
    

    <!-- jQuery -->
    <script src="<?php echo base_url()?>aset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>aset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>aset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url()?>aset/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>aset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()?>aset/dist/js/sb-admin-2.js"></script>

     <script type="text/javascript" src="<?php echo base_url()?>aset/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url()?>aset/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8">
        </script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

  
   

     <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
     $('#datetimepicker1').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
      autoclose: 0,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
        });
    </script> 

    <script type="text/javascript">
     $('#datetimepicker2').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
      autoclose: 0,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
        });
    </script> 

     <script>
        function func1() 
        {
            var notf = <?php echo json_encode($this->session->flashdata('notif')); ?>

            
            if (notf!=null)
            {
                var x = noty({text: ''+notf , type: 'success'});
            }
            
        }
        window.onload=func1;

    </script>

    <script type="text/javascript">
        function add_tempat() 
        {
            var tmpt = prompt("Input nama tempat", "");
            var slct = document.getElementById ("cmb_tempat");
            var opt = document.createElement("option");

            if (tmpt != null) 
            {
                opt.text = tmpt;
                slct.add(opt);
                slct.value = tmpt;
            }
        }

        function is_contain(x)
        {
            var table = document.getElementById("dataTables-example2");
            var i;

            for (i=1 ; i<table.rows.length ;i++)
            {
                if (table.rows[i].cells[1].innerHTML == x)
                {
                    return true;
                }
            }

            return false;
        }

        function add_tabel(x)
        {
            
            var table = document.getElementById("dataTables-example2");
            var table2 = document.getElementById("dataTables-example");
            var txt = document.getElementById("txt_kd");
            var txt2 = document.getElementById("txt_tmpt");

            var no = table.rows.length;
            
            if (!is_contain(x))
            {
                var posisi = get_index(x);
             
                var row = table.insertRow(no);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);

                cell1.innerHTML = no;
                cell2.innerHTML = table2.rows[posisi].cells[1].innerHTML;
                cell3.innerHTML = table2.rows[posisi].cells[2].innerHTML;
                cell4.innerHTML = table2.rows[posisi].cells[3].innerHTML;
                cell5.innerHTML = "<td><button type=\"button\" class=\"btn btn-danger\" onclick= \"del_tabel("+no+")\">Hapus</button></td>";
                
                txt.value = txt.value+table2.rows[posisi].cells[1].innerHTML+" ";
                txt2.value = txt2.value+table2.rows[posisi].cells[3].innerHTML+"^";    
            }
        }

        function add_tabel_op(x)
        {
            
            var table = document.getElementById("dataTables-example2");
            var table2 = document.getElementById("dataTables-example");
         

            var no = table.rows.length;
            
            if (!is_contain(x))
            {
                var posisi = get_index(x);
            
                var row = table.insertRow(no);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);

                cell1.innerHTML = no;
                cell2.innerHTML = table2.rows[posisi].cells[1].innerHTML;
                cell3.innerHTML = "<td><input class=\"form-control\" placeholder=\"Isikan Keterangan di sini\" type=\"text\" name = \"txt_keterangan\"></td>";
                cell4.innerHTML = table2.rows[posisi].cells[3].innerHTML;
                cell5.innerHTML = "<td><button type=\"button\" class=\"btn btn-danger\" onclick= \"del_tabel_op("+no+")\">Hapus</button></td>";
            }
        }

         function add_tabel_no(x)
        {
            
            var table = document.getElementById("dataTables-example2");
            var table2 = document.getElementById("dataTables-example");
         

            var no = table.rows.length;
            
            if (!is_contain(x))
            {
                var posisi = get_index(x);
            
                var row = table.insertRow(no);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);

                cell1.innerHTML = no;
                cell2.innerHTML = table2.rows[posisi].cells[1].innerHTML;
                cell3.innerHTML = "<td><input class=\"form-control\" placeholder=\"Isikan Sebab non aktif\" type=\"text\" name = \"txt_noaktif\"></td>";
                cell4.innerHTML = "<td><input class=\"form-control\" placeholder=\"Isikan Lokasi Penyimpanan di sini\" type=\"text\" name = \"txt_keterangan\"></td>";
                cell5.innerHTML = "<td><button type=\"button\" class=\"btn btn-danger\" onclick= \"del_tabel_op("+no+")\">Hapus</button></td>";
            }
        }

        function konfirmasi_opname()
        {
             var table = document.getElementById("dataTables-example2");
             var txt = document.getElementById("txt_kd");
             var txt2 = document.getElementById("txt_ket");

             var i=0;
             txt.value = "";
             txt2.value = "";

             for  (i=1 ; i<table.rows.length ; i++)
             {
                  txt.value = txt.value + table.rows[i].cells[1].innerHTML + " ";
                  txt2.value = txt2.value + table.rows[i].cells[2].firstChild.value + "^";
             }
             enable_submit(2);

        }

        function konfirmasi_nonaktif()
        {
             var table = document.getElementById("dataTables-example2");
             var txt = document.getElementById("txt_kd");
             var txt2 = document.getElementById("txt_ket");
             var txt3 = document.getElementById("txt_sbb");
             

             var i=0;
             txt.value = "";
             txt2.value = "";
             txt3.value = "";
             
             for  (i=1 ; i<table.rows.length ; i++)
             {
                  txt.value = txt.value + table.rows[i].cells[1].innerHTML + " ";
                  txt2.value = txt2.value + table.rows[i].cells[3].firstChild.value + "^";
                  txt3.value = txt3.value + table.rows[i].cells[2].firstChild.value + "^";
             }
             enable_submit(3);
        }

        function del_tabel_op(x)
        {
            
            var tabel = document.getElementById("dataTables-example2");

            tabel.deleteRow(x); 

            re_number_op();
        }

        function del_tabel_no(x)
        {
            
            var tabel = document.getElementById("dataTables-example2");

            tabel.deleteRow(x); 

            re_number_no();
        }
        function del_tabel(x)
        {
            
            var tabel = document.getElementById("dataTables-example2");
            var txt = document.getElementById("txt_kd");
            var txt2 = document.getElementById("txt_tmpt");
            

            var hasil = txt.value.split(" ");
            var hasil2 = txt2.value.split("^");

            var i=0;

            txt.value = "";
            txt2.value = "";
            for (i=0; i<hasil.length-1;i++)
            {
                if (tabel.rows[x].cells[1].innerHTML != hasil[i])
                {
                    txt.value = txt.value + hasil[i] + " ";
                    txt2.value = txt2.value + hasil2[i] + "^";
                }
                
            }

            tabel.deleteRow(x); 

            re_number();
        }

        function re_number()
        {
             var table = document.getElementById("dataTables-example2");
             var ukuran = table.rows.length;

            var i = 1;
            for (i=1; i<= ukuran ; i++)
            {
                table.rows[i].cells[0].innerHTML = i;
                table.rows[i].cells[4].innerHTML = "<td><button type=\"button\" class=\"btn btn-danger\" onclick= \"del_tabel("+i+")\">Hapus</button></td>";
            }
        }

         function re_number_op()
        {
             var table = document.getElementById("dataTables-example2");
             var ukuran = table.rows.length;

            var i = 1;
            for (i=1; i<= ukuran ; i++)
            {
                table.rows[i].cells[0].innerHTML = i;
                table.rows[i].cells[4].innerHTML = "<td><button type=\"button\" class=\"btn btn-danger\" onclick= \"del_tabel_op("+i+")\">Hapus</button></td>";
            }
        }

        function re_number_no()
        {
             var table = document.getElementById("dataTables-example2");
             var ukuran = table.rows.length;

            var i = 1;
            for (i=1; i<= ukuran ; i++)
            {
                table.rows[i].cells[0].innerHTML = i;
                table.rows[i].cells[4].innerHTML = "<td><button type=\"button\" class=\"btn btn-danger\" onclick= \"del_tabel_no("+i+")\">Hapus</button></td>";
            }
        }

        function get_index(nama)
        {
            var table2 = document.getElementById("dataTables-example");
            var ukuran = table2.rows.length;
            var i = 1;
            for (i=1 ; i<=ukuran ; i++)
            {
                if (table2.rows[i].cells[1].innerHTML == nama)
                {
                    break;
                }
            }

            return i;
        }

        function set_edit_user(nmbr)
        {
            var table = document.getElementById("dataTables-example");

            var tx_username = document.getElementById("id_username");
            var tx_nama = document.getElementById("id_nama");
            var tx_jabatan = document.getElementById("id_jabatan");
            var tx_email = document.getElementById("txt_email");
            var tx_kontak = document.getElementById("txt_kontak");


            tx_username.value = table.rows[nmbr].cells[2].innerHTML;
            tx_nama.value = table.rows[nmbr].cells[3].innerHTML;
            tx_jabatan.value = table.rows[nmbr].cells[4].innerHTML;
            tx_email.value = table.rows[nmbr].cells[5].innerHTML;
            tx_kontak.value = table.rows[nmbr].cells[6].innerHTML;
              
            
            if (table.rows[nmbr].cells[1].innerHTML == "1")
            {
                document.getElementById("rad_1").checked = true;
                document.getElementById("rad_2").checked = false;
            }   
            else
            {
                document.getElementById("rad_1").checked = false;
                document.getElementById("rad_2").checked = true;
            }       
        }


    </script>

     <script type="text/javascript">
        function disable_text() 
        {
            document.getElementById('txt_kondisi').disabled=true;
            document.getElementById('txt_kondisi').value = null;
               
        }

        function enable_text() 
        {
            document.getElementById('txt_kondisi').disabled=false;
        }

        function enable_submit (id)
        {
            if (id==1)
            {
                document.getElementById('btn_mutasi').disabled=false;
            }
            else if (id==2)
            {
                document.getElementById('btn_opname').disabled=false;
            }
            else
            {
                document.getElementById('btn_nonaktif').disabled=false;
            }
        }
    </script>

    <script>
        var password1 = document.getElementById("txt_pass")
          , confirm_password1 = document.getElementById("txt_pass2");

        function validatePassword1(){
          if(password1.value != confirm_password1.value) {
            confirm_password1.setCustomValidity("Password tidak sesuai");
          } else {
            confirm_password1.setCustomValidity('');
          }
        }

        password1.onchange = validatePassword1;
        confirm_password1.onkeyup = validatePassword1;
    </script>

     <script>
        var password2 = document.getElementById("txt_pass_edit")
          , confirm_password2 = document.getElementById("txt_pass2_edit");

        function validatePassword2(){
          if(password2.value != confirm_password2.value) {
            confirm_password2.setCustomValidity("Password tidak sesuai");
          } else {
            confirm_password2.setCustomValidity('');
          }
        }

        password2.onchange = validatePassword2;
        confirm_password2.onkeyup = validatePassword2;
    </script>

     <script>
        var password3 = document.getElementById("txt_pass_prof")
          , confirm_password3 = document.getElementById("txt_pass2_prof");

        function validatePassword3(){
          if(password3.value != confirm_password3.value) {
            confirm_password3.setCustomValidity("Password tidak sesuai");
          } else {
            confirm_password3.setCustomValidity('');
          }
        }

        password3.onchange = validatePassword3;
        confirm_password3.onkeyup = validatePassword3;
    </script>

     <script>

        var barChartData_hd = 
        {
            labels: ["Baik", "Sedang", "Rusak"],
            datasets: [
                {
                    //SET COLORS BELOW
                    fillColor: "rgba(51,122,188,0.5)",
                    strokeColor: "rgba(51,122,188,0.8)",
                    highlightFill: "rgba(51,122,188,0.75)",
                    highlightStroke: "rgba(51,122,188,1)",
                    data: [<?php echo $kondisi_hd[0] ?>, <?php echo $kondisi_hd[1] ?>, <?php echo $kondisi_hd[2] ?>] // SET YOUR DATA POINTS HERE
                },
                 {
                    //SET COLORS BELOW
                    fillColor: "rgba(89,186,92,0.5)",
                    strokeColor: "rgba(89,186,92,0.8)",
                    highlightFill: "rgba(89,186,92,0.75)",
                    highlightStroke: "rgba(89,186,92,1)",
                    data: [<?php echo $kondisi_pc[0] ?>, <?php echo $kondisi_pc[1] ?>, <?php echo $kondisi_pc[2] ?>] // SET YOUR DATA POINTS HERE
                },
                 {
                    //SET COLORS BELOW
                    fillColor: "rgba(238,174,77,0.5)",
                    strokeColor: "rgba(238,174,77,0.8)",
                    highlightFill: "rgba(238,174,77,0.75)",
                    highlightStroke: "rgba(238,174,77,1)",
                    data: [<?php echo $kondisi_sv[0] ?>,<?php echo $kondisi_sv[1] ?>,<?php echo $kondisi_sv[2] ?>] // SET YOUR DATA POINTS HERE
                }

            ]

        }


        var barChartData_no = 
        {
            labels: ["Perangkat IT", "Komputer", "Server"],
            datasets: [
                {
                    //SET COLORS BELOW
                    fillColor: "rgba(220,83,79,0.5)",
                    strokeColor: "rgba(220,83,79,0.8)",
                    highlightFill: "rgba(220,83,79,0.75)",
                    highlightStroke: "rgba(220,83,79,1)",
                    data: [<?php echo $nonAktif[0] ?>,<?php echo $nonAktif[1] ?>,<?php echo $nonAktif[2] ?>] // SET YOUR DATA POINTS HERE
                }
            ]

        }

        var barChartData_op = 
        {
            labels: ["Perangkat IT", "Komputer", "Server"],
            datasets: [
                {
                    //SET COLORS BELOW
                    fillColor: "rgba(220,83,79,0.5)",
                    strokeColor: "rgba(220,83,79,0.8)",
                    highlightFill: "rgba(220,83,79,0.75)",
                    highlightStroke: "rgba(220,83,79,1)",
                    data: [<?php echo $opname[0] ?>,<?php echo $opname[1] ?>,<?php echo $opname[2] ?>] // SET YOUR DATA POINTS HERE
                }
            ]

        }

        window.onload = function () 
        {
            var ctx_hd = document.getElementById("BarChart_hd").getContext("2d");
            window.myLine = new Chart(ctx_hd).Bar(barChartData_hd, {
                responsive: true
            });


            var ctx_no = document.getElementById("BarChart_no").getContext("2d");
            window.myLine = new Chart(ctx_no).Bar(barChartData_no, {
                responsive: true
            });

            var ctx_op = document.getElementById("BarChart_op").getContext("2d");
            window.myLine = new Chart(ctx_op).Bar(barChartData_op, {
                responsive: true
            });
        };
    </script>

    <script>
        
        function set_detail(spec)
        {
            document.getElementById("txted_id").value = spec[0];
            document.getElementById("txted_keterangan").value = spec[1];
            document.getElementById("txted_tanggal").value = spec[2];
            document.getElementById("txted_tempat").value = spec[3];
            document.getElementById("txted_guna").value = spec[4];
            document.getElementById("txted_ip").value = spec[5];
            document.getElementById("txted_proc").value = spec[6];
            document.getElementById("txted_mobo").value = spec[7];
            document.getElementById("txted_hdd").value = spec[8];
            document.getElementById("txted_ram").value = spec[9];
            document.getElementById("txted_vga").value = spec[10];
            document.getElementById("txted_lan").value = spec[11];
            document.getElementById("txted_kondisi").value = spec[12];
        }

    </script>

    <script>
        function set_aktiv(data)
        {
            document.getElementById('txt_id').value = data[0];
            document.getElementById('txt_tgl_no').value = data[1];
            document.getElementById('txt_lokasi_no').value = data[2];
            document.getElementById('txt_sebab_no').value = data[3];
        }

        function set_nonaktif (data)
        {
            document.getElementById('txt_id').value = data;
        }
    </script>

    <script>
        
        $('#datetimepicker_aw').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
      autoclose: 0,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
        });
               
        
        $('#datetimepicker_ak').datetimepicker({
            enabled : false,
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
      autoclose: 0,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      showOn: "off",
      forceParse: 0
        });

         

    </script>

    <script>

        function set_date_off()
        {
            $("span").css("pointer-events", "none");
            document.getElementById('txt_tanggal_ak').disabled = true;
            document.getElementById('txt_tanggal_aw').disabled = true;
              
        }

        function set_date_on()
        {
            $("span").css("pointer-events", "auto");
            document.getElementById('txt_tanggal_ak').disabled = false;
            document.getElementById('txt_tanggal_aw').disabled = false;
        }
        
    </script>
</body>

</html>
