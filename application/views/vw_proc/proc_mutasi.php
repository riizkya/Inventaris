<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Proses Mutasi Barang</h1>
                    <dt>Gunakan form ini untuk melakukan mutasi terhadap suatu barang.</dt>
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
                                                <th>Lokasi</th>
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
                                                        echo "<td>$val->penempatan</td>";
                                                        echo "<td><button type=\"submit\" class=\"btn btn-primary\" onclick = \"add_tabel('$val->id_barang')\">Tambah</button></td>";
                                                    echo "</tr>";
                                                    $no++;   
                                                }

                                                foreach($data_sv->result() as $val)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>$no</td>";
                                                    echo "<td>$val->id_barang</td>";
                                                        echo "<td>$val->keterangan</td>";
                                                        echo "<td>$val->penempatan</td>";
                                                        echo "<td><button type=\"submit\" class=\"btn btn-primary\" onclick = \"add_tabel('$val->id_barang')\">Tambah</button></td>";
                                                    echo "</tr>";
                                                    $no++;   
                                                }

                                                foreach($data_hd->result() as $val)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>$no</td>";
                                                    echo "<td>$val->id_barang</td>";
                                                        echo "<td>$val->nama_hardware</td>";
                                                        echo "<td>$val->penempatan</td>";
                                                        echo "<td><button type=\"submit\" class=\"btn btn-primary\" onclick = \"add_tabel('$val->id_barang')\">Tambah</button></td>";
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
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Data Barang yang akan dimutasikan
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
      <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_mutasi/input" method="post">
                         

                         <label>Tanggal Mutasi</label>
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

                            <label>Penempatan Baru</label>
                            <div class = "row">
                                <div class = "col-md-5">

                                            <select class="form-control" id = "cmb_tempat" name = "cmb_tempat">
                                               <?php 
                                                    foreach ($tempat_pc->result() as $val) 
                                                    {                  
                                                        echo "<option>".$val->penempatan."</option>";
                                                    }
                                                    foreach ($tempat_hd->result() as $val) 
                                                    {                  
                                                        echo "<option>".$val->penempatan."</option>";
                                                    }
                                                    foreach ($tempat_sv->result() as $val) 
                                                    {                  
                                                        echo "<option>".$val->penempatan."</option>";
                                                    }
                                                ?>
                                            </select>
                                </div>

                                <div class = "col-md-5">
                                   <button type="button" class="btn btn-success" onclick= "add_tempat()">Tambah Tempat</button><br>
                                </div>
                             </div>
                             <br>  

                            

                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2" name="dataTables-example2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Keterangan</th>
                                                <th>Lokasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                             
                                        </tbody>
                                </table>
                            </div>
                            <br><br>
                                 <input class="form-control" type="hidden" id = "txt_kd" name = "txt_kd">
                                 <input class="form-control" type="hidden" id = "txt_tmpt" name = "txt_tmpt">
                             
                            
                            <div class = "col-md-5 col-md-offset-5">

                              <button type="submit" class="btn btn-success" id  = "btn_mutasi">Submit Mutasi</button><br>
                            

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