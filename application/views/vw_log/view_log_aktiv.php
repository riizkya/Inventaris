 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Log Proses Aktivasi Barang</h1>
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
                <th>ID Barang</th>
                <th>Tanggal Nonaktif</th>
                <th>Tanggal Aktif</th>
                <th>Sebab Nonaktif</th>
                <th>Sebab Aktif</th>
                <th>Lokasi Awal</th>
                <th>Lokasi Baru</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;

                foreach ($data_log_aktif->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->tanggal_nonaktiv</td>";
                    echo "<td>$val->tanggal_aktiv</td>";
                    echo "<td>$val->sebab_nonaktiv</td>";
                    echo "<td>$val->sebab_aktiv</td>";
                    echo "<td>$val->lokasi_awal</td>";
                    echo "<td>$val->lokasi_baru</td>";
                  
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