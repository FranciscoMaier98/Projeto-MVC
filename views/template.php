<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Loja</title>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" type="text/css" />
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>

		<?php $this->loadViewInTemplate($viewName, $viewData); ?> 

		<footer class="footer">
        	<p>&copy; <?= date('Y') ?> Company, Inc. &middot; <a href="#">Francisco</a> &middot; <a href="#">Salomon</a> &middot; <a href="#">Maier</a></p>
    	</footer>
	</body>
</html>