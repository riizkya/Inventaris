 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Seluruh Barang yang Dimutasikan</h1>
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
                <th>Tanggal Mutasi</th>
                <th>ID Barang</th>
                <th>Keterangan Barang</th>
                <th>Penempatan Awal</th>
                <th>Penempatan Akhir</th>
               

            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;

                foreach ($data_mt_pc->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->keterangan</td>";
                    echo "<td>$val->tujuan_aw</td>";
                    echo "<td>$val->tujuan_ak</td>";
                  
                    echo "</tr>";   

                    $no++;
                }

                 foreach ($data_mt_sv->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->keterangan</td>";
                    echo "<td>$val->tujuan_aw</td>";
                    echo "<td>$val->tujuan_ak</td>";
                   
                    echo "</tr>";   

                    $no++;
                }

                 foreach ($data_mt_hd->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->nama_hardware</td>";
                    echo "<td>$val->tujuan_aw</td>";
                    echo "<td>$val->tujuan_ak</td>";
                    
                    echo "</tr>";   

                    $no++;
                }

             ?>
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