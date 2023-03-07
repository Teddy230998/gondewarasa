
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Sewa Jasa</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
               
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Tanggal Sewa</th>
                <th>Alamat</th>
                <th>Tanggal Acara</th>
                <th>Biaya</th>
                <th>Jasa</th>
                <th>User</th>
                <th>Status</th>
                <th>Action</th>
                    </tr><?php
                  $sewa_jasa_data= $this->db->query("SELECT * from sewa_jasa inner join jasa on sewa_jasa.id_jasa=jasa.id_jasa inner join user on sewa_jasa.id_user=user.id_user");
                  foreach ($sewa_jasa_data->result() as $sewa_jasa)
                  {
                    ?>
                        <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $sewa_jasa->tgl_sewa ?></td>
                    <td><?php echo $sewa_jasa->alamat ?></td>
                    <td><?php echo $sewa_jasa->tgl_acara ?></td>
                    <td><?php echo $sewa_jasa->biaya ?></td>
                    <td><?php echo $sewa_jasa->nama ?></td>
                    <td><?php echo $sewa_jasa->nama_user ?></td>
                    <?php
                    $pembayaran_data= $this->db->query("SELECT * from pembayaran where id_sewa='$sewa_jasa->id_sj'");
                        $pembayaran=$pembayaran_data->num_rows();  
                        if($pembayaran==NULL){
                            echo '<td><span class="badge badge-warning">Belum Bayar</span></td>';
                        }elseif($pembayaran!=NULL){
                            $query6=$this->db->query("SELECT * from pembayaran where id_sewa='$sewa_jasa->id_sj'");
                                foreach($query6->result() as $query6){
                                    if($query6->status==1){
                                    echo '<td><span class="badge badge-warning">Sudah bayar menunggu Konfirmasi Admin</span></td>';
                                    }else{
                                        echo '<td><span class="badge badge-warning">Sewa sudah diKonfirmasi </span></td>';
                                    }
                                }
                        }
                    ?>
                    
                    <td style="text-align:center" width="200px">
                        <?php 
                        echo anchor(site_url('sewa_jasa/read/'.$sewa_jasa->id_sj),'Detail Pembayaran');
                        if($query6->status==1){
                        echo '|';
                        echo '<form action="'.site_url('sewa_jasa/konfirmasi').'" method="post">';
                        echo '<input type="hidden" name="status" value="2">';
                        echo '<input type="hidden" name="id_pem" value="'.$query6->id_pem.'">';
                        echo '<button type="submit" class="btn btn-success">Konfirmasi</button></form>';
                        }
                        ?>
                    </td>
                </tr>
                        <?php
                    }
                    ?>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Total Record : <?php echo $total_rows ?></a>
                </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
              </div>
            </div>
          </div>

        </div>