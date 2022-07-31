</div>
<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://vtcbcsr.edu.in/">College Management System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<script>
    (function() {
        let path = window.location.href;

        $('.nav-link').each(function() {
            let href = $(this).attr('href');

            if (path === decodeURIComponent(href)) {
                $(this).addClass('active');
                let parent = $(this).closest('.has-treeview');
                parent.addClass('menu-open');
                $(parent).find('.nav-link').first().addClass('active');
            }
        });
    }());
</script>

<!-- For subjects.php -->
<script>
    jQuery(document).ready(function () {
        jQuery('#select_class').change(function () {
            jQuery.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {'class_id': jQuery(this).val()},
                success: function (response) {
                    jQuery('#select_section').html(response);
                },
            });
        });
    });
</script>
</body>

</html>