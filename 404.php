<?php header("HTTP/1.1 404 Not Found"); ?>
<!DOCTYPE html>
<html>
<head>
<title>404 - 找不到</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="Stylesheet" type="text/css" href="http://wiki.ktmud.com/style.css" />
<script type="text/javascript">
    var disqus_identifier = 'wiki__404';
</script>
</head>
<body>
<div id="all">
<div id="header">
	<ul id="top-nav">
		<li>
			<a href="http://wiki.ktmud.com/index.html">首页</a>
		</li>
		<li>
			<a href="http://wiki.ktmud.com/tips/index.html">经验总结</a>
		</li>
		<li>
			<a href="http://wiki.ktmud.com/diary/diary.html">日记</a>
		</li>
	</ul>
</div>
<div id="cse"></div>
<div id="main">
<h1 id="toc_1">此页是隐形的</h1>

<p>
乖，你什么都没看到，哈！
</p>

<p>
请通过下面的评论区给我留言，反馈此页面出现的原因。
</p>
</div>
<div id="footer">
    <p>&copy; 2010 丘迟 &nbsp;&nbsp; <a href="/SiteMap.html" title="站点地图">给我一点导航吧</a></p>
</div>
</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1', {language : 'zh-CN'});
  google.setOnLoadCallback(function() {
      var customSearchControl = new google.search.CustomSearchControl('013996024720219627519:n_9lss7xao0');
      customSearchControl.setResultSetSize(5);
      customSearchControl.setNoResultsString('哎哟喂，找不到这个东东呢……');

      var options = new google.search.DrawOptions();
      options.setAutoComplete(true);
      customSearchControl.draw('cse');

      var input = document.querySelector('input.gsc-input');
      input.style.cssText = '';
      input.className = 'gsc-input cesbg';
      input.onfocus = function(){
          if( input.className.indexOf('cesbg') >= 0 ) input.className = 'gsc-input';
      };
      input.onblur = function(){
          if(input.value=='') input.className = 'gsc-input cesbg';
      };

  }, true);
</script>
<link rel="stylesheet" href="cse.css" type="text/css" />
<script src="http://code.jquery.com/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="http://wiki.ktmud.com/vimwiki.js" type="text/javascript"></script>
</body>
</html>
