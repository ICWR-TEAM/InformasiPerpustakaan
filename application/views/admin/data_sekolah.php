
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-5" style="">
        <div class="card-body">
            <form class="" method="post">
                <div class="row">
                    <div class="col-md-4 mt-2">
                        <label for="nama"><strong>Nama Perpustakaan :</strong> </label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama_perpustakaan" value="<?php echo $var->nama_perpustakaan; ?>" class="form-control" id="nama" placeholder="Nama Perpustakaan...">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 mt-2">
                        <label for="alamat"><strong>Alamat Perpustakaan :</strong> </label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="alamat_perpustakaan" value="<?php echo $var->alamat_perpustakaan; ?>" class="form-control" id="alamat" placeholder="Alamat Perpustakaan...">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 mt-2">
                        <label for="kepsek"><strong>Nama Kepala Sekolah :</strong> </label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama_kepsek" value="<?php echo $var->nama_kepsek; ?>" class="form-control" id="kepsek" placeholder="Nama Kepala Sekolah...">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 mt-2">
                        <label for="nip"><strong>NIP Kepala Sekolah :</strong> </label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nip" value="<?php echo $var->nip; ?>" class="form-control" id="nip" placeholder="NIP Kepala Sekolah...">
                    </div>
                </div>
                <input type="submit" name="submit" value="Update Data Sekolah" class="btn btn-secondary col-md-12 mt-3">
            </form>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if ($this->session->flashdata("berhasil_update_sekolah")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil update data sekolah!',
        'success'
    )
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata("gagal_update_sekolah")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal update data sekolah!',
        'error'
    )
    </script>
<?php endif; ?>
