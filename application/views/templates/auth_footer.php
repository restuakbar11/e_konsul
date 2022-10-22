<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script type="text/javascript">
	var inFormOrLink;
$('a').live('click', function() { inFormOrLink = true; });
$('form').bind('submit', function() { inFormOrLink = true; });

$(window).bind("beforeunload", function() { 
    return inFormOrLink ? "Do you really want to close?" : null; 
})

</script>

</body>

</html>