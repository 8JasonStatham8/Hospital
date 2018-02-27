<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理者登陆</title>
 	<link rel="stylesheet" type="text/css" href="/Hospital/Public/css/bootstrap.min.css" />
 	<link rel="stylesheet" type="text/css" href="/Hospital/Public/css/Login/login.css" />
	<script src="/Hospital/Public/js/jquery.min.js"></script>
	<script src="/Hospital/Publicjs/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">  
	  <div class="row myCenter">  
	    <div class="col-xs-6 col-md-4 col-center-block">  
	      <form class="form-signin" action="/Hospital/index.php/Login/Login/adminlogin" method="post">  
	        <h2 class="form-signin-heading">请登录</h2>
	        <br>
	        <label for="username" class="sr-only">用户名</label>
	        <input type="text" id="username" name="username" class="form-control" placeholder="用户名" required autofocus>  
	        <br>  
	        <label for="inputPassword" class="sr-only">密码</label>  
	        <br>  
	        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>  
	        <br>  
	        <br>  
	        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>  
	      </form>  
	    </div>  
	  </div>  
	</div>  

</body>
</html>