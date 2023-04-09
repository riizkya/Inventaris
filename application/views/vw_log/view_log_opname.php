 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Log Proses Opname</h1>
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
                <th>Tanggal Opname</th>
                <th>Keterangan Opname</th>
                <th>Status</th>
                <th>Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;

                foreach ($data_log_opname->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->tanggal_masuk</td>";
                    echo "<td>$val->keterangan</td>";
                    echo "<td>$val->status</td>";
                    echo "<td>$val->tanggal_selesai</td>";
                    
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