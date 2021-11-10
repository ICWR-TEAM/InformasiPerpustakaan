<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">EDIT SISWA</h6>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-2 mt-2">
                        <label for="nama"><strong>Nama :</strong> </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="nama" value="<?php echo $var->nama; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                        <label for=""><strong>Kelas :</strong> </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="kelas" value="<?php echo $var->kelas; ?>" id="kelas_siswa" class="form-control">
                        <div class=" text-sm" style="color: red; opacity: 0.8;">* Kelas harus sama pada data kelas</div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                        <label for=""><strong>NISN :</strong> </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="nisn" value="<?php echo $var->nisn; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                        <label for=""><strong>Email :</strong> </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="email" value="<?php echo $var->email; ?>" class="form-control">
                    </div>
                </div>
                <input type="submit" name="submit" value="Update Data Siswa" class="btn btn-secondary col-md-12 mt-3">
            </form>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata("berhasil")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil edit siswa!',
        'success'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("gagal")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal edit siswa!',
        'error'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("gagal_duplikat")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal update siswa, silahkan cek kembali kelas siswa yang anda tambahkan!',
        'error'
    )
    </script>
<?php endif; ?>
