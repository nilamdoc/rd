<!doctype html>
<html>
<head>
</head>
<body class="view-main" id="app">
	<div class="block Sans">
	<?php echo $this->_render('element', 'header');?>

		<?php echo $this->content(); ?>

	<hr>
	<?php echo $this->_render('element', 'footer');?>
	</div>
</body>
<script>
Start();
</script>
</html>