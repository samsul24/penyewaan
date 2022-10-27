   <!-- FOOTER -->
   <!--===================================================-->
   <footer id="footer">

       <!-- Visible when footer positions are fixed -->
       <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
       <div class="show-fixed pad-rgt pull-right">
           You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
       </div>




       <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
       <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
       <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

       <p class="pad-lft">&#0169; <?php echo date('Y') ?> | TA - Tanding Futsal Malang</p>



   </footer>
   <!--===================================================-->
   <!-- END FOOTER -->


   <!-- SCROLL PAGE BUTTON -->
   <!--===================================================-->
   <button class="scroll-top btn">
       <i class="pci-chevron chevron-up"></i>
   </button>
   <!--===================================================-->
   </div>
   <!--===================================================-->
   <!-- END OF CONTAINER -->





   <!--JAVASCRIPT-->
   <!--=================================================-->


   <!--BootstrapJS [ RECOMMENDED ]-->
   <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


   <!--NiftyJS [ RECOMMENDED ]-->
   <script src="<?php echo base_url() ?>assets/js/nifty.min.js"></script>


   <!--DataTables [ OPTIONAL ]-->
   <script src="<?php echo base_url() ?>assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
   <script src="<?php echo base_url() ?>assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
   <script src="<?php echo base_url() ?>assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


   <!--=================================================-->


   <script>
       // Data table
       // Basic Data Tables with responsive plugin
       // -----------------------------------------------------------------
       $('#active-datatable').dataTable({
           "responsive": true,
           "language": {
               "paginate": {
                   "previous": '<i class="demo-psi-arrow-left"></i>',
                   "next": '<i class="demo-psi-arrow-right"></i>'
               }
           }
       });
   </script>



   <?php if ($this->session->flashdata('msg') == "greeting") {

        $username = ucfirst($this->session->flashdata('msg-name'));
    ?>
       <script>
           $(function() {

               var msg = '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="ti-face-smile icon-2x"></i></span></div><div class="media-body"><h4 class="alert-title">Hallo !</h4><p class="alert-message">Selamat datang <?php echo $username ?>.</p></div>';

               $.niftyNoty({
                   type: 'info',
                   container: 'floating',
                   html: msg,
                   closeBtn: true,
                   timer: 6000,
                   floating: {
                       position: 'top-right',
                       animationIn: 'jellyIn',
                       animationOut: 'fadeOutRight'
                   },
               });
           });
       </script>

   <?php } ?>



   </body>

   </html>