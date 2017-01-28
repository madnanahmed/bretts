
<!-- Bootstrap JS -->
  <script src="<?= base_url() ?>assets/admin/assets/vendor/tether/dist/js/tether.min.js"></script> <!-- // Tooltips in BS4 -->
  <script src="<?= base_url() ?>assets/admin/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script> <!-- // BS4 -->
  <!-- // END Bootstrap -->
  
  <!-- App JS -->
  <script src="<?= base_url() ?>assets/admin/assets/js/sidebar.min.js"></script> <!-- // APP Sidebar -->
  <!-- // END App JS -->
  <!-- Vendor JS -->
    <!-- CHART -->
    <script src="<?= base_url() ?>assets/admin/assets/vendor/raphael/raphael.js"></script> <!-- Required by CHART (morrisjs) -->
    <script src="<?= base_url() ?>assets/admin/assets/vendor/morris.js/morris.min.js"></script> <!-- Required by CHART (morrisjs) -->
  <!-- // END Vendor Scripts -->
  <!-- Example of Vendor Inits (bundled in "examples/js/examples.bundle.min.js") -->
  <script src="<?= base_url() ?>assets/admin/examples/js/chart.js"></script>
  <!-- // END Example JS -->
  <script src="<?= base_url()?>assets/admin/assets/js/datatable.js"></script>
  <script>
<?php
$order = $orderBy = "";
  if($this->router->class.'/'.$this->uri->segment(2) == 'admin/users'){
    $order = "0";
    $orderBy = 'DESC';
  }
  if($this->router->class.'/'.$this->uri->segment(2) == 'admin/inactive_users'){
    $order = "4";
    $orderBy = 'DESC';
  }
  if($this->router->class.'/'.$this->uri->segment(2) == 'admin/login_signup_history'){
    $order = "2";
    $orderBy = 'desc';
  }
  if($this->router->class.'/'.$this->uri->segment(2) == 'admin/property'){
  $order = "0";
  $orderBy = 'desc';
  }
if($this->router->class.'/'.$this->uri->segment(2) == 'admin/deleted_properties'){
  $order = "0";
  $orderBy = 'desc';
  }
?>
    $(document).ready(function() {
// users
      $('#datatable').DataTable( {
        "columnDefs": [
          {
            "targets": [ 0 ],
            "visible": false,
            "searchable": true
          }
        ],
        "order": [
          [ <?= $order; ?>, '<?= $orderBy; ?>' ]
        ]
      } );

//      login signup

        $('#login_signup').DataTable( {
          "columnDefs": [
            {
              "targets": [ 2 ],
              "visible": false,
              "searchable": true
            }
          ],
          "order": [
            [ <?= $order; ?>, '<?= $orderBy; ?>' ]
          ]
        } );

        $('#property').DataTable( {
          "columnDefs": [
            {
              "targets": [ 0 ],
              "visible": true,
              "searchable": true
            }
          ],
          "order": [
            [ <?= $order; ?>, '<?= $orderBy; ?>' ]
          ]
        } );
      $('#deleted_properties').DataTable( {
        "columnDefs": [
          {
            "targets": [ 0 ],
            "visible": true,
            "searchable": true
          }
        ],
        "order": [
          [ <?= $order; ?>, '<?= $orderBy; ?>' ]
        ]
      } );
      //
    } );
  </script>


</body>

<!-- Mirrored from admin-plus.envato.ipv4.ro/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2016 03:45:07 GMT -->
</html>