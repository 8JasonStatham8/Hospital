<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>系统管理员添加医院</title>
    <script src="/Hospital/Public/js/jquery.min.js"></script>
    <script src="/Hospital/Publicjs/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Hospital/Public/css/bootstrap.min.css" />

</head>
<body>
<link rel="stylesheet" type="text/css" href="/Hospital/Public/css/Common/page.css" />

<header style="text-align: center">
	<div class="jumbotron well">
		<h2 style="font-family:'Times New Roman',Georgia,Serif">C605&nbsp;医&nbsp;院&nbsp;管&nbsp;理&nbsp;系&nbsp;统</h2>
		<a style="width: 20%" class="btn btn-primary btn-large" href="/Hospital/index.php/Login/Logout/logout">退出</a>
	</div>
</header>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="row clearfix">
                    <div class="col-md-4 column">
                        <ul class="nav nav-stacked nav-pills">
                            <li class="active">
                                 <a href="/Hospital/index.php/System/Hospital/lst">医院管理</a>
                            </li>
                            <li>
                                 <a href="/Hospital/index.php/System/Black/black">黑名单管理</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 column">
                        <form role="form" action="/Hospital/index.php/System/Hospital/add" method="post">
                            <div class="form-group">
                                 <label for="hos_name">医院名称</label><input type="text" class="form-control" id="hos_name" name="hos_name" value="" required />
                        
                            </div>
                            
                            <div class="form-group">
                                <select name="hos_area" class="form-control" required>
                                    <option value="">请选择行政区</option>
                                    <option value="市南区">市南区</option>
                                    <option value="莱西市">莱西市</option>
                                    <option value="市北区">市北区</option>
                                    <option value="黄岛区">黄岛区</option>
                                    <option value="崂山区">崂山区</option>
                                    <option value="李沧区">李沧区</option>
                                    <option value="城阳区">城阳区</option>
                                    <option value="胶州市">胶州市</option>
                                    <option value="即墨市">即墨市</option>
                                    <option value="平度市">平度市</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="hos_rank" class="form-control" required>
                                    <option value="">请选择医院等级</option>
                                    <option value="三级甲等">三级甲等</option>
                                    <option value="三级乙等">三级乙等</option>
                                    <option value="二级甲等">二级甲等</option>
                                    <option value="二级乙等">二级乙等</option>
                                </select>
                            </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-default">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
</body>
</html>