<link href="<?php echo base_url("assets/admin/") ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">DAFTAR SISWA</h6>
      </div>
      <div class="card-body">
          <a href="<?php echo base_url("dashboard/tambah_usersiswa/") ?>" class="btn btn-secondary mb-3 col-md-12">Tambah User</a>
          <div class="table-responsive">
            <table class="table table-bordered hovered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th width="20px">No</th>
                      <th width="200px">Nama Siswa</th>
                      <th width="100px">Kelas</th>
                      <th width="50px">NISN</th>
                      <th width="70px">Nomor Seri</th>
                      <th width="180px">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($siswa as $var): ?>
                      <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $var->nama; ?></td>
                          <td><?php echo $var->kelas; ?></td>
                          <td><?php echo $var->nisn; ?></td>
                          <td><?php echo $var->nomor_seriperpus; ?></td>
                          <!-- <td><?php echo $var->email ?></td> -->
                          <td> <a href="<?php echo base_url("dashboard/edit_siswa/".$var->id_user) ?>/" class="btn btn-warning">Edit</a> <button href="<?php echo $var->id_user ?>" class="btn btn-danger delete-perpus">Delete</button> <a href="<?php echo base_url("dashboard/cetak_kartu/".$var->id_user); ?>" class="btn btn-info">View</a> </td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata("gagal_hapus_perpus")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal hapus user perpus, dikarenakan ada tanggungan peminjaman!',
        'error'
    )
    </script>
<?php endif; ?>
