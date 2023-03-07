<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agenda</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('agenda/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('agenda'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Judul Agenda</th>
                <th>Isi Agenda</th>
                <th>Tempat Agenda</th>
                <th>Tgl Agenda</th>
                <th>Waktu Agenda</th>
                <th>Foto Agenda</th>
                <th><?php echo anchor(site_url('agenda/create'),'+', 'class="btn btn-success"'); ?></th>
                    </tr><?php
                    foreach ($agenda_data as $agenda)
                    {
                        ?>
                        <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $agenda->judul_agenda ?></td>
                    <td><?php echo $agenda->isi_agenda ?></td>
                    <td><?php echo $agenda->tempat_agenda ?></td>
                    <td><?php echo $agenda->tgl_agenda ?></td>
                    <td><?php echo $agenda->waktu_agenda ?></td>
                    <td><img width='100' src="<?= base_url()?>user/agenda/<?php echo $agenda->foto_agenda ?>"> </td>
                    <td style="text-align:center" width="200px">
                        <?php 
                        echo anchor(site_url('agenda/update/'.$agenda->id_agenda),'Update'); 
                        echo ' | '; 
                        echo anchor(site_url('agenda/delete/'.$agenda->id_agenda),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
            </div>
          </div>

        </div>