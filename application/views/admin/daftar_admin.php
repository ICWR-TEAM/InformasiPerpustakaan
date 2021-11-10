<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-5" style="">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">DAFTAR ADMIN</h6>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url("dashboard/tambah_admin/") ?>" class="btn btn-secondary col-md-12 mb-3">Tambah User </a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th width="300px">Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($awok as $var) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlentities($var->username); ?></td>
                            <td> <a href="<?php echo base_url("dashboard/hapus_admin/".$var->id); ?>" class="btn btn-danger">Delete</a> </td>
                        </tr>
                        <?php
                    }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata("berhasil_tambah_admin")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil menambah admin!',
        'success'
    )
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata("berhasil_hapus_admin")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil menghapus admin!',
        'success'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("gagal_hapus_admin")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal hapus admin, tidak boleh menghapus semua user!',
        'error'
    )
    </script>
<?php endif; ?>
