</div>
<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2012-2023 <a href="https://vtcbcsr.edu.in/">College Management System</a> by Naresh Sharma.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
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
    jQuery(document).ready(function() {
        jQuery('#select_class').change(function() {
            jQuery.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {
                    'class_id': jQuery(this).val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response.count > 0) {
                        jQuery('#section-container').show();
                        jQuery('#select_section').html(response.options);
                    } else {
                        jQuery('#section-container').hide();
                    }
                }
            });
        });
    });
</script>
</body>

</html>