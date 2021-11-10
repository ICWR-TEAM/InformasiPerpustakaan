
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">TAMBAH SISWA</h6>
      </div>
      <div class="card-body">
          <form method="post">
              <div class="row mt-3">
                  <div class="col-md-2">
                      <label for="nama" class=""><strong>Nama:</strong></label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" name="nama" value="" placeholder="Nama..." class="form-control">
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2">
                      <label for="kelas" class=""><strong> Kelas:</strong></label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" name="kelas" class="form-control" id="kelas_siswa" placeholder="Kelas...">
                      <div class=" text-sm" style="color: red; opacity: 0.8;">* Kelas harus sama pada data kelas</div>
                      
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2">
                      <label for="nama" class=""><strong>NISN:</strong></label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" name="nisn" value="" placeholder="NISN..." class="form-control">
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2">
                      <label for="nama" class=""><strong>Nomor seri perpus:</strong></label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" name="nomor_seri" value="<?php echo $unik; ?>" placeholder="Nama..." class="form-control" readonly>
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2">
                      <label for="nama" class=""><strong>Email:</strong></label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" name="email" value="" placeholder="Email..." class="form-control">
                  </div>
              </div>
              <input type="submit" name="submit" value="Tambah Siswa" class="btn btn-secondary col-md-12 mt-3">
          </form>
      </div>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata("gagal_input")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal input user siswa, silahkan tambahkan kelas terlebih dahulu!',
        'error'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("berhasil_input_siswa")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil input user siswa, silahkan cetak kartu terlebih dahulu!',
        'success'
    )
    </script>
<?php endif; ?>
