<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/global/global.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/deznav-init.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/vendor/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- clockpicker -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- pickdate -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/pickadate/picker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/pickadate/picker.time.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/pickadate/picker.date.js"></script>



<!-- Daterangepicker -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins-init/bs-daterange-picker-init.js"></script>
<!-- Clockpicker init -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins-init/material-date-picker-init.js"></script>
<!-- Pickdate -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins-init/pickadate-init.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/lightgallery/js/lightgallery-all.min.js"></script>

<!-- Datatable -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script>
    (function($) {
        var table = $('#example5').DataTable({
            searching: false,
            paging: true,
            select: false,
            //info: false,         
            lengthChange: false

        });
        $('#example tbody').on('click', 'tr', function() {
            var data = table.row(this).data();

        });
    })(jQuery);
</script>
<script>
    $('.lightgallery').lightGallery({
        loop: true,
        thumbnail: true,
        exThumbImage: 'data-exthumbimage'
    });
</script>
</body>

</html>