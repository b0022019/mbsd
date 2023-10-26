<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>タイムアウト</title>
</head>
<body>

<p>表示されました</p>

</body>

<script type="text/javascript">
	function sleep(waitMsec) {
    var startMsec = new Date();
    while (new Date() - startMsec < waitMsec);
	}
	console.log('100秒経過しました！');
	sleep(100000);
</script>
</html>
