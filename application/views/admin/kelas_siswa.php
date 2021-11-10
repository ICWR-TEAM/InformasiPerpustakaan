
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">KELAS SISWA</h6>
      </div>
      <div class="card-body">
          <a href="<?php echo base_url("dashboard/tambah_kelas/") ?>" class="btn btn-secondary mb-3 col-md-12">Tambah Kelas</a>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th width="20px">No</th>
                      <th width="300px">Kelas</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($kelas as $var): ?>
                      <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $var->kelas; ?></td>
                          <td> <a href="<?php echo base_url("dashboard/delete_kelas/".$var->id_kelas); ?>/" class="btn btn-danger delete-kelas">Delete</a> </td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata("gagal_hapus_kelas")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal hapus kelas!',
        'error'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("berhasil_hapus_kelas")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil hapus kelas!',
        'success'
    )
    </script>
<?php endif; ?>
