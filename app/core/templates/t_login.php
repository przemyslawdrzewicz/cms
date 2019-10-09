<link type="text/css" rel="stylesheet" href="<?php echo APP_RES  ?>css/colorbox.css">
<script type="text/javascript" src="<?php echo APP_RES ?>javascript/jquery.js"></script>
<script type="text/javascript" src="<?php echo APP_RES ?>javascript/jquery.colorbox-min.js"></script>

<script>

$(document).ready(function()
{
	$.colorbox({
		href: '<?php SITE_PATH; ?>app/login.php',
		overlayClose: false,
		escKey: false
	})
});






</script>