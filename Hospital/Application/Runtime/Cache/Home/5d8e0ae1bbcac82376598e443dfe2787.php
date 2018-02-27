<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>患者登陆</title>
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
	      <form class="form-signin" action="/Hospital/index.php/Home/Login/adminlogin">  
	        <h2 class="form-signin-heading">请登录</h2>
	        <br>
	        <label for="user_id" class="sr-only">身份证号</label>
	        <input type="text" id="user_id" class="form-control" placeholder="身份证号" required autofocus>  
	        <br>  
	        <label for="user_name" class="sr-only">姓名</label>  
	        <br>  
	        <input type="text" id="user_name" class="form-control" placeholder="姓名" required>  
	        <br> 
	        <label for="user_phone" class="sr-only">电话</label>  
	        <br>  
	        <input type="text" id="user_phone" class="form-control" placeholder="电话" required>  
	        <br>  
	        <br>  
	        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>  
	      </form>  
	    </div>  
	  </div>  
	</div>  

</body>
</html>