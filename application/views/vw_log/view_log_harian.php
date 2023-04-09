 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Log History Sistem</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
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
                <th>Username</th>
                <th>Tanggal dan Waktu</th>
                <th>Kategori</th>
                <th>Nama Tabel</th>
                <th>Detail</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;

                foreach ($data_history->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->user</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->kategori</td>";
                    echo "<td>$val->tabel</td>";
                    echo "<td>$val->detail</td>";
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