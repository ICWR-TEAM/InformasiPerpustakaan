
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> -->


<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-5" style="">
        <div class="card-body">
            <h2 class="text-center text-dark"><strong><?php echo $view->nama_buku; ?></strong></h2>
            <hr style="width: 100px; border-bottom: 2px solid #999;">
            <img src="<?php echo base_url('./assets/img/'.$view->gambar) ?>" alt="" style="margin-left: auto; margin-right: auto; display: block;" class="mt-5 mb-5">
            <p><?php echo $view->deskripsi; ?></p>
            <p>
                <strong>Nomor Seri:</strong> <?php echo $view->nomor_seri ?>
                <br>
                <strong>Jumlah: </strong><?php echo $view->jumlah ?>
                <br>
                <strong>Status ketersediaan: </strong><?php echo $view->jumlah-$view->status ?>
            </p>
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form class=" mb-3" method="post">
                        <label for=""> <strong>Nomor Seri Siswa :</strong> </label>
                        <input type="text" class="form-control" name="nomor_seri" id="nomor_seri" value="" placeholder="Nomor Seri Siswa...">
                        <label for=""><strong>NISN Siswa : </strong> </label>
                        <input type="text" name="nisn" value="" id="nisn" placeholder="NISN Siswa..." class="form-control">
                        <label for=""><strong>Jumlah Pinjam :</strong> </label>
                        <input type="number" name="jumlah_pinjam" value="" placeholder="Jumlah Pinjam..." class="form-control" min="1">
                        <input type="submit" name="submit" value="Tambah riwayat peminjaman" class="btn btn-secondary col-md-12 mt-3 mb-3">
                    </form>
                    <hr>
                    <strong>Riwayat peminjaman:</strong>
                    <pre>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="250px">Nama</th>
                                    <th width="150px">Kelas</th>
                                    <th width="100px">NISN</th>
                                    <th width="150px">Nomor User Perpustakaan</th>
                                    <th width="150px">Jumlah Peminjaman</th>
                                    <th width="180px">Ubah Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                <?php
                                if ($riwayat) {
                                    foreach ($riwayat as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $value->nama; ?></td>
                                            <td><?php echo $value->kelas; ?></td>
                                            <td><?php echo $value->nisn; ?></td>
                                            <td><?php echo $value->nomor_seriperpus; ?></td>
                                            <td><?php echo $value->jumlah_pinjam; ?></td>
                                            <td><button href="<?php echo $value->id_riwayat; ?>" class="btn btn-info delete-riwayat">Hapus riwayat</button> </td>
                                        </tr>
                                    <?php
                                        }
                                    }else {
                                        ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada riwayat peminjaman</td>
                                        </tr>
                                        <?php
                                    }
                                 ?>
                            </tbody>
                        </table>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if ($this->session->flashdata("berhasil_input_buku")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Berhasil!',
        'Anda berhasil input riwayat buku!',
        'success'
    )
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata("gagal_input_buku")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Anda gagal input riwayat buku!',
        'error'
    )
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata("data_tidak_cocok")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Data NISN dan Nomor Seri Siswa tidak cocok!',
        'error'
    )
    </script>
<?php endif; ?>
