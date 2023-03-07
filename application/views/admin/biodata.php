<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Profil</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <?php 
                    $username2 = $this->session->userdata('username');
                    $bi = $this->db->query("SELECT * from admin where username='$username2'");
                          foreach ($bi->result() as $bi1) {
                ?>
                <tr><td>Username</td><td><?php echo $bi1->username; ?></td></tr>
                <tr><td>Nama</td><td><?php echo $bi1->nama; ?></td></tr>
                          <?php }?>
                </table>
              </div>
            </div>
          </div>

        </div>
