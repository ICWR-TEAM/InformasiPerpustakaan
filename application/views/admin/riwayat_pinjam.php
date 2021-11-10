<link href="<?php echo base_url("assets/admin/") ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-5" style="">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">DAFTAR RIWAYAT PEMINJAMAN</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Buku</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($view_all as $var): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $var->nama; ?></td>
                                <td><?php echo $var->nama_buku; ?></td>
                                <td><?php echo $var->nisn; ?></td>
                                <td><?php echo $var->kelas; ?></td>
                                <td>  <a href="<?php echo base_url("dashboard/view/".$var->id_buku) ?>/" class="btn btn-primary">View</a> <button href="<?php echo $var->id_riwayat; ?>" class="btn btn-danger delete-riwayat">Hapus riwayat</button> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
