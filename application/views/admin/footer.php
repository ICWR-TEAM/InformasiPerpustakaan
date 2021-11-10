</div>
<footer class="shadow sticky-footer bg-white" style="position: fixed; bottom: 0; width: 100%; ">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="login.html">Logout</a>
  </div>
</div>
</div>
</div>

<script src="<?php echo base_url("assets/admin/") ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url("assets/admin/") ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url("assets/admin/") ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url("assets/admin/") ?>js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url("assets/admin/"); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets/admin/"); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#dataTable').DataTable();
  });
      $(".delete").on("click",function(){
          var id = $(this).attr('href');
          Swal.fire({
              title: 'Alert',
              text: 'Apakah anda yakin untuk menghapus buku tersebut?',
              icon: "warning",
              confirmButtonColor: '#d9534f',
              showCancelButton: true
          }).then((result) => {
                if (result.value) {
                  $.ajax({
                    url:"<?php echo base_url("dashboard/delete_buku/") ?>",
                    method:"post",
                    beforeSend :function () {
                        Swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                              swal.showLoading()
                            }
                          })
                    },
                    data:{id:id},
                    success:function(data){
                      Swal.fire(
                        'Hapus',
                        'Berhasil Terhapus',
                        'success'
                      )
                      setTimeout(location.reload.bind(location), 5000);
                    }
                  })
              } else if (result.dismiss === swal.DismissReason.cancel) {
                  Swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                  )
                }
              })
    });

</script>

<script type="text/javascript">
$(document).ready(function(){
    $(".delete-riwayat").on("click",function(){
        var id = $(this).attr('href');
        Swal.fire({
            title: 'Alert',
            text: 'Apakah anda yakin untuk menghapus riwayat buku tersebut?',
            icon: "warning",
            confirmButtonColor: '#d9534f',
            showCancelButton: true
        }).then((result) => {
              if (result.value) {
                $.ajax({
                  url:"<?php echo base_url("dashboard/delete_riwayat/") ?>",
                  method:"post",
                  beforeSend :function () {
                      Swal.fire({
                          title: 'Menunggu',
                          html: 'Memproses data',
                          onOpen: () => {
                            swal.showLoading()
                          }
                        })
                  },
                  data:{id:id},
                  success:function(data){
                    Swal.fire(
                      'Hapus',
                      'Berhasil Menghapus Riwayat',
                      'success'
                    )
                    setTimeout(location.reload.bind(location), 5000);

                  }
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                Swal.fire(
                  'Batal',
                  'Anda membatalkan penghapusan',
                  'error'
                )
              }
            })
  });

});

      $(".delete-perpus").on("click",function(){
          var id = $(this).attr('href');
          Swal.fire({
              title: 'Alert',
              text: 'Apakah anda yakin untuk menghapus user tersebut tersebut?',
              icon: "warning",
              confirmButtonColor: '#d9534f',
              showCancelButton: true
          }).then((result) => {
                if (result.value) {
                  $.ajax({
                    url:"<?php echo base_url("dashboard/c_delete_user_perpus/") ?>",
                    method:"post",
                    beforeSend :function () {
                        Swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                              swal.showLoading()
                            }
                          })
                    },
                    data:{id:id},
                    success:function(data){
                      Swal.fire(
                        'Hapus',
                        'Berhasil Menghapus User',
                        'success'
                      )
                      setTimeout(location.reload.bind(location), 5000);
                    }
                  })
              } else if (result.dismiss === swal.DismissReason.cancel) {
                  Swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                  )
                }
              })
        });
</script>

<script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $( "#nomor_seri" ).autocomplete({
          source: "<?php echo site_url('dashboard/data_siswa/?');?>"
        });

        $( "#kelas_siswa" ).autocomplete({
          source: "<?php echo site_url('dashboard/data_kelas_siswa/?');?>"
        });

        $( "#nisn" ).autocomplete({
          source: "<?php echo site_url('dashboard/data_nisn_siswa/?');?>"
        });
    });
</script>

</body>

</html>
