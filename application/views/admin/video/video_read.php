<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Video</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <tr><td>Keterangan Video</td><td><?php echo $ket_video; ?></td></tr>
                <tr><td>Link Video</td><td><?php echo $link_video; ?></td></tr>
                <tr><td>Tgl input Video</td><td><?php echo $tglinput_video; ?></td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo site_url('admin/video') ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">

                    </span>
                    <span class="text">Cancel</span>
                  </a>    
                </td></tr>
                </table>
              </div>
            </div>
          </div>

        </div>