 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Akun</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Seluruh Pengguna
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <?php 
                            if (validation_errors() != null)
                            {
                                echo "
                                <div class=\"alert alert-danger alert-dismissable\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                ".validation_errors()."
                                </div>";
                            }
                        ?>

                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
            <tr>
                <th>No</th>
                <th>Privilege</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>E-Mail</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $no=1; foreach($data_us->result() as $val) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $val->privilege ?></td>
                <td><?php echo $val->username ?></td>
                <td><?php echo $val->nama ?></td>
                <td><?php echo $val->jabatan ?></td>
                <td><?php echo $val->email ?></td>
                <td><?php echo $val->kontak ?></td>
                <td>
                     <button class="btn btn-primary" data-toggle="modal" data-target="#myModal_edit" onclick = "set_edit_user(<?php echo $no?>)">Edit</button>
                    <a href="<?php echo base_url()?>manajer_user/delete/<?=$val->username?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                </td>
            
            </tr>
            <?php $no++; endforeach; ?>

        </tbody>
                                </table>
                            </div>
                           <br>
                           
                           <?php  $this->load->view('vw_user/add_user'); ?>
                           <?php  $this->load->view('vw_user/edit_user'); ?>
                          

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->