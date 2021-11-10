
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">TAMBAH KELAS SISWA</h6>
      </div>
      <div class="card-body">
          <form method="post">
              <div class="row">
                    <div class="col-md-2 mt-2">
                        <label for="kelas"><strong>Kelas : </strong></label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="kelas" value="" placeholder="Kelas..." class="form-control" id="kelas">
                    </div>
              </div>
              <input type="submit" name="submit" value="Tambah Kelas" class="btn btn-secondary col-md-12 mt-3">
          </form>
      </div>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata("berhasil")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil tambah kelas!',
        'success'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("gagal")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal tambah kelas, kelas tidak boleh dubplikat!',
        'error'
    )
    </script>
<?php endif; ?>
