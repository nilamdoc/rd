<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Ruchi Doctor, Leader Enterpreneur and Transformational Coach <?php echo $this->title(); ?></title>
	<?php echo $this->html->style([ 'style']); ?>
	<link rel="stylesheet" type="text/css" href="/css/framework7-bundle.css">
	<?php echo $this->styles(); ?>
	<script type="text/javascript" src="/framework7/framework7-bundle.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>

	<?php echo $this->html->link('Icon', null, ['type' => 'icon']); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap&family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/framework7/framework7-icons/css/framework7-icons.css">
</head>
<body class="view-main" id="app">
	<div class=" Sans s18 ">
	<!--<?php echo $this->_render('element', 'header');?>-->
		<?php echo $this->content(); ?>
	<hr>
	<?php echo $this->_render('element', 'footer');?>
	</div>
</body>
<script>
Start();
</script>
</html>