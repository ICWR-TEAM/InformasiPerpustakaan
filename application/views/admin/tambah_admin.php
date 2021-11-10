<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-5" style="">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">TAMBAH ADMIN</h6>
        </div>
        <div class="card-body">
            <form class="" method="post">
                <div class="row">
                    <div class="col-md-2 mt-2">
                        <label for="username"><strong>Username: </strong> </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="username" value="" placeholder="Username..." class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                        <label for="username"><strong>Password: </strong> </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="password" value="" placeholder="Password..." class="form-control">
                    </div>
                </div>
                <input type="submit" name="submit" value="Tambah Admin" class="btn btn-secondary col-md-12 mt-3">
            </form>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata("tidak_boleh_kosong")): ?>
    <script type="text/javascript">
    Swal.fire(
        'Gagal!',
        'Username dan Password harus di isi!',
        'error'
    )
    </script>
<?php endif; ?>
