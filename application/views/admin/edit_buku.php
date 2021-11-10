
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div style="margin-bottom: 100px;">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">EDIT BUKU</h6>
      </div>
      <div class="card-body">

          <form class="" method="post" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-2 mt-1">
                      Judul Buku:
                  </div>
                  <div class="col-md-10">
                      <input type="text" name="judul_buku" value="<?php echo $valuene->nama_buku ?>" placeholder="Judul Buku..." class="form-control">
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2 mt-1">
                      Nomor Seri:
                  </div>
                  <div class="col-md-10">
                      <input type="text" name="nomor_seri" value="<?php echo $valuene->nomor_seri ?>" placeholder="Nomor Seri..." class="form-control">
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2 mt-1">
                      Jumlah:
                  </div>
                  <div class="col-md-10">
                      <input type="number" min="1" name="jumlah" value="<?php echo $valuene->jumlah ?>" placeholder="Jumlah..." class="form-control">
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2">
                      Gambar:
                  </div>
                  <div class="col-md-10">
                      <input type="file" name="gambar" value="" class="form-control">
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-2 mt-1">
                      Deskripsi:
                  </div>
                  <div class="col-md-10">
                      <textarea name="deskripsi" rows="8" cols="80" class="form-control" placeholder="Deskripsi..."><?php echo $valuene->deskripsi ?></textarea>
                  </div>
              </div>
              <input type="submit" name="submit" value="Tambah Buku" class="btn btn-secondary col-md-12 mt-3">
          </form>

      </div>
    </div>
</div>
