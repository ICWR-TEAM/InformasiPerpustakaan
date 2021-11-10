<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="<?php echo base_url("assets/admin/") ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <title>Selamat Datang Di Informasi Perpustakaan!</title>
  </head>
  <body class="font-formal" style="background-color: #eee;">

        <header class="shadow-sm" style="height: 100vh; min-height: 500px; background-color: black; background-image: url('<?php echo base_url('./assets/header.jpg') ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
            <div class="h-100" style="margin: 0 auto; height: 100%; background-color: rgba(0, 0, 0, 0.555);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 text-center text-light">
                            <h1 class="font-ketiga"><?php echo $data_sekolah->nama_perpustakaan; ?></h1>
                            <h5 class="font-kedua">SELAMAT DATANG DAN SELAMAT MELIHAT KOLEKSI BUKU PERPUSTAKAAN</h5>
                            <div class="mt-5">
                              <a href="#lanjut" class="button-header">
                                Read More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                </svg>
                              </a>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <section id="lanjut" class="pb-5">

            <div class="container pt-5">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class="text-center pt-3 pb-3"><strong>DAFTAR BUKU</strong></h2>
                        <pre style="font-family: 'Times New Roman', serif;">
                              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" style="color: grey;">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th width="170px">Judul Buku</th>
                                        <th width="80px">Nomor Seri</th>
                                        <th width="">Gambar</th>
                                        <th width="30px">Jumlah</th>
                                        <th width="80px">Aksi</th>
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
                                            <td><div style="margin-top: 20px;"> <a href="<?php echo base_url("view/".$var->id_buku) ?>/" class="button-header"><i class="fas fa-eye"></i> LIHAT</a> </div></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                              </table>
                          </pre>
                    </div>
                </div>
            </div>
        </section>

        <footer style="background-color: #99A799; color: black;" class="text-center pt-5 pb-5">
            <strong>Copyright &copy; 2021 | Built With <i class="fas fa-heart text-danger"></i> <a href="http://incrustwerush.org/" target="_blank" style="color: black;">ICWR-TECH</a></strong>
        </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#dataTable').DataTable();
        });
    </script>


    <script type="text/javascript">
    $(window).scroll(function(){
        $("nav").toggleClass("scrolled",$(this).scrollTop()>200);
    });
    </script>

  </body>
</html>
