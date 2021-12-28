<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/')?>dist/js/adminlte.js"></script>
<script src="<?=base_url('assets/')?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/plugins/')?>pace-progress/pace.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script type="text/javascript">
var loadingeffect='<div style="text-align:center"><i class="fas fa-2x fa-sync-alt fa-3x fa-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>';
 function tossetuju(){
        var checkBox = document.getElementById("checkbox");
        var warning = document.getElementById("check_warning");
        if (checkBox.checked == false){
            warning.style.display = "block";
            return;
            }
            $.ajax({
              url: "<?= base_url('admin/master/tossetuju')?>",
              type: "POST",
              beforeSend: function () {
                Pace.restart();
            },
              success:function(response){
                location.reload();
              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'Server Dalam Perbaikan'
                  });
              }
    });
}
function popup(url){
  window.open(url,'popUpWindow','height=400,width=600,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
}
		$(document).ready(function(){
            $('#tos').modal('show');
            $(document).ajaxStart(function() { Pace.restart(); });
		})
        function show(){
            Pace.restart();
        };
        function hide(){
          
        }
   

    

   $("#logout").click( function() {
    Swal.fire({
                icon: 'question',
                title: 'PERHATIAN!',
                text: 'Apakah anda ingin Keluar/Log Out sekarang?',
                showConfirmButton: true,
                showCancelButton: true,
                showBackdrop: true,
                confirmButtonText: 'Ya Keluar',
                cancelButtonText: 'Tidak'
            }).then(function(data){
                if(data.value === true){
                    window.location.href = "<?= base_url('auth/logout')?>";
                }
            });
   });
    </script>
