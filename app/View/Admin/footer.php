</div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script>

    function rupiah(e){
      e.value = formatRupiah(e.value);
    }
      /* Fungsi */
function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
    </script>
    <script src="/script.js"></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script type="text/javascript">
       
$(document).ready(function(){
    // $("#pageLoader").fadeOut();
    $("#pageLoader").fadeOut("slow");
    // $("#pageLoader").fadeOut(3000);

});

</script>
<style>
                .modal-backdrop {
  z-index: 200;
}
              </style>
<script src="/sweetalert.js"></script>


<?php 

  if(isset($_SESSION['flash'])){
?>
<script>
  Swal.fire({
  icon: "<?= $_SESSION['flash']['status'] ?>",
  title: "<?= $_SESSION['flash']['title'] ?>",
  text: "<?= $_SESSION['flash']['message'] ?>",
});
</script>
<?php 
unset($_SESSION['flash']);
} ?>
  </body>
</html>
