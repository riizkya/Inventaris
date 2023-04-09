 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Seluruh Perangkat IT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Tabel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
            <tr>
                <th>No</th>
                <th>ID Perangkat</th>
                <th>Nama Perangkat</th>
                <th>Tanggal Masuk</th>
                <th>Penempatan</th>
                <th>Kegunaan</th>
                <th>Kondisi</th>
                <th>Pilihan</th>

            </tr>
        </thead>
        <tbody>

            <?php $no=1; foreach($data_hd->result() as $val) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $val->id_barang ?></td>
                <td><?php echo $val->nama_hardware ?></td>
                <td><?php echo $val->tanggal ?></td>
                <td><?php echo $val->penempatan ?></td>
                <td><?php echo $val->kegunaan ?></td>
                <td><?php echo $val->kondisi ?></td>
                <td>
                    <a href="<?php echo base_url()?>manajer_perangkat/update/<?=$val->id_barang?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-edit fa-1x"></i></a>
                    <a href="<?php echo base_url()?>manajer_perangkat/delete/<?=$val->id_barang?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-eraser fa-1x"></i></a>
                </td>
            
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
                                </table>
                            </div>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->