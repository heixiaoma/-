<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>下单</title>

</head>
<body>
<img src="map.png">
<form method="post" action="map.php">
    <label>出发城市</label>
    <select name="start">
        <option value="十堰市">十堰市</option>
        <option value="荆门市">荆门市</option>
        <option value="黄冈市">黄冈市</option>
        <option value="恩施自治区">恩施自治区</option>
        <option value="宜昌">宜昌</option>
        <option value="武汉">武汉</option>
        <option value="荆州市">荆州市</option>
    </select>
    <label>到达城市</label>
    <select name="end">
        <option value="十堰市">十堰市</option>
        <option value="荆门市">荆门市</option>
        <option value="黄冈市">黄冈市</option>
        <option value="恩施自治区">恩施自治区</option>
        <option value="宜昌">宜昌</option>
        <option value="武汉">武汉</option>
        <option value="荆州市">荆州市</option>
    </select>
    <input type="submit" value="下单"/>
</form>

</body>
</html>
