<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理者登陆</title>
 	<link rel="stylesheet" type="text/css" href="/Hospital/Public/css/bootstrap.min.css" />
	<script src="/Hospital/Public/js/jquery.min.js"></script>
	<script src="/Hospital/Publicjs/bootstrap.min.js"></script>
	<style>
		*{
			margin: 0;
			padding: 0;
		}  
		.col-center-block {  
	    	float: none;  
	    	display: block;  
	    	margin-left: auto;  
	    	margin-right: auto;  
			}  
	</style> 
</head>
<body>
	
	<header style="text-align: center;background-color: #337AB7; margin-top: -20px;">
		<h1>C605医院管理系统</h1>
	</header>

	<div class="container">  
	  <div class="row myCenter">  
	    <div class="col-xs-6 col-md-4 col-center-block">  
	      <form class="form-signin" action="login" method="POST">  
	        <h2 class="form-signin-heading">请登录</h2>
	        <br>
	        <label for="username" class="sr-only">用户名</label>
	        <input type="text" id="username" class="form-control" placeholder="用户名" required autofocus>  
	        <br>  
	        <label for="inputPassword" class="sr-only">密码</label>  
	        <br>  
	        <input type="password" id="inputPassword" class="form-control" placeholder="密码" required>  
	        <br>  
	        <br>  
	        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>  
	      </form>  
	    </div>  
	  </div>  
	</div>  

</body>
</html>