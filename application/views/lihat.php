<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="<?php echo base_url("assets/admin/") ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/style.css') ?>">
    <title>Informasi Perpustakaan - Lihat Buku <?php echo $view->nama_buku; ?></title>
  </head>
  <body style="background-color: #eee;" class="font-formal">
      <div class="container pb-5">
          <div class="card mt-5 border-0 shadow">
              <div class="card-body">
                  <h2 class="text-center"><?php echo $view->nama_buku; ?></h2>
                  <hr class="haer">
                  <!-- <img src="<?php echo base_url('./assets/img/'.$view->gambar); ?>" alt="" class=""> -->
                  <img src="<?php echo base_url('./assets/img/'.$view->gambar) ?>" alt="" style="margin-left: auto; margin-right: auto; display: block;" class="mt-5 mb-5">
                  <p class="container text-muted">
                      <?php echo $view->deskripsi; ?>
                  </p>
                  <p class="container">
                      <strong>Nomor Seri Buku:</strong> <?php echo $view->nomor_seri ?>
                      <br>
                      <strong>Jumlah: </strong><?php echo $view->jumlah ?>
                      <br>
                      <strong>Status ketersediaan: </strong><?php echo $view->jumlah-$view->status ?>
                  </p>
                  <a href="<?php echo base_url(""); ?>" class="col-md-12 container button-header btn" style="max-width: 100%;">Kembali Ke Halaman Depan</a>
              </div>
          </div>
      </div>
      <footer style="background-color: #99A799; color: black;" class="text-center pt-5 pb-5">
          <strong>Copyright &copy; 2021 | Built With <i class="fas fa-heart text-danger"></i> <a href="http://incrustwerush.org/" target="_blank" style="color: black;">ICWR-TECH</a></strong>
      </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
