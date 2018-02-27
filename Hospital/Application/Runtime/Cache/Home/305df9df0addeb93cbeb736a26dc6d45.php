<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
		</title>
		<!--<link rel="stylesheet" type="text/css" href="/Hospital/Public/a/xiaoye.css" />
		<script type="text/javascript" src="/Hospital/Public/daye.js"></script>-->
		<script type="text/javascript" src="/Hospital/Public/daye.js"></script>

	</head>
	<body>
		<h1>
			<!--<?php echo ($aa); ?>-->
			<?php if(is_array($aa)): foreach($aa as $key=>$v): echo ($v["title"]); ?><br><?php endforeach; endif; ?>
		</h1>
	</body>
</html>