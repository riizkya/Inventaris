<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Proses Non Aktif Barang</h1>
                    <dt>Gunakan form ini untuk menonaktifkan suatu barang</dt>
                    <br>
                </div>
                <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Seluruh Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Keterangan</th>
                                                <th>Kondisi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                                $no=1;
                                                foreach($data_pc->result() as $val)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>$no</td>";
                                                    echo "<td>$val->id_barang</td>";
                                                        echo "<td>$val->keterangan</td>";
                                                        echo "<td>$val->kondisi</td>";
                                                        echo "<td><button type=\"submit\" class=\"btn btn-primary\" onclick = \"add_tabel_no('$val->id_barang')\">Tambah</button></td>";
                                                    echo "</tr>";
                                                    $no++;   
                                                }

                                                foreach($data_sv->result() as $val)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>$no</td>";
                                                    echo "<td>$val->id_barang</td>";
                                                        echo "<td>$val->keterangan</td>";
                                                        echo "<td>$val->kondisi</td>";
                                                        echo "<td><button type=\"submit\" class=\"btn btn-primary\" onclick = \"add_tabel_no('$val->id_barang')\">Tambah</button></td>";
                                                    echo "</tr>";
                                                    $no++;   
                                                }

                                                foreach($data_hd->result() as $val)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>$no</td>";
                                                    echo "<td>$val->id_barang</td>";
                                                        echo "<td>$val->nama_hardware</td>";
                                                        echo "<td>$val->kondisi</td>";
                                                        echo "<td><button type=\"submit\" class=\"btn btn-primary\" onclick = \"add_tabel_no('$val->id_barang')\">Tambah</button></td>";
                                                    echo "</tr>";
                                                    $no++;   
                                                }
                                             ?>
                                           
                                            
                                        </tbody>
                                </table>
                            </div>
                            <br><br>


                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Data Barang yang akan dinonaktifkan
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
      <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_nonaktif/input" method="post">
                         

                         <label>Tanggal Non Aktif</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                   <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name = "txt_tanggal" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                             </div>
                             <br>  

                        

                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2" name="dataTables-example2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Sebab Non Aktif</th>
                                                <th>Lokasi Penyimpanan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                             
                                        </tbody>
                                </table>
                            </div>
                            <br><br>
                                 <input class="form-control" type="hidden" id = "txt_kd" name = "txt_kd">
                                 <input class="form-control" type="hidden" id = "txt_ket" name = "txt_ket">
                                 <input class="form-control" type="hidden" id = "txt_sbb" name = "txt_sbb">
                        
                        <div class = "col-md-5 col-md-offset-5">
                              <button type="submit" class="btn btn-outline btn-danger" id = "btn_nonaktif" onclick = "konfirmasi_nonaktif()">Submit Non Aktif</button><br>
                        </div>
                        
                       
</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->