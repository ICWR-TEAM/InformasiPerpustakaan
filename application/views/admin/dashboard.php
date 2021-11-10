<link href="<?php echo base_url("assets/admin/") ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-5" style="">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">DAFTAR BUKU</h6>
      </div>
      <div class="card-body">
          <div class="text-right mb-3">
              <a href="<?php echo base_url("dashboard/tambah_buku/"); ?>" class="btn btn-secondary col-md-12">TAMBAH BUKU</a>
          </div>
        <div class="table-responsive">
          <table class="table table-bordered hovered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th width="170px">Judul Buku</th>
                    <th width="80px">Nomor Seri</th>
                    <th width="">Gambar</th>
                    <th width="30px">Jumlah</th>
                    <!-- <th>Deskripsi</th> -->
                    <th width="50px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach ($buku as $var): ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $var->nama_buku ?></td>
                        <td><?php echo $var->nomor_seri ?></td>
                        <td><img src="<?php echo base_url("./assets/img/") ?><?php echo $var->gambar ?>"></td>
                        <td><?php echo $var->jumlah ?></td>
                        <!-- <td><?php echo $var->deskripsi ?></td> -->
                        <td> <a href="<?php echo base_url("dashboard/view/".$var->id_buku) ?>/" class="btn btn-primary">View</a> <a href="<?php echo base_url("dashboard/edit/".$var->id_buku) ?>/" class="btn btn-warning">Edit</a><button href="<?php echo $var->id_buku ?>" class="btn btn-danger delete">Delete</button> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php if ($this->session->flashdata("berhasil_tambah")): ?>
            <div class="alert alert-success">
                Berhasil tambah buku
            </div>
        <?php endif; ?>
      </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url("assets/admin/"); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets/admin/"); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<?php if ($this->session->flashdata("berhasil_tambah_buku")): ?>
<script type="text/javascript">
Swal.fire(
    'Berhasil!',
    'Anda berhasil menambahkan buku!',
    'success'
)
</script>
<?php endif; ?>
<?php if ($this->session->flashdata("berhasil_edit_buku")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil update buku!',
        'success'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("gagal")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal update buku!',
        'error'
    )
    </script>
<?php endif; ?>
