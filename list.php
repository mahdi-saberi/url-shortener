<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
require_once 'functions/UrlShortener.php';

$urlShortener = new UrlShortener();

session_start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="url shortener">
    <title>MakeItShort!</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<br>
<center>
    <h1>لیست کوتاه شده ها</h1>
	<div style='margin-top:10px'>
		<table border='1px' cellspacing='2px' cellpadding='2px' style='direction:rtl'>
			<thead>
					<th>ردیف</th>
					<th>آدرس</th>
					<th>آدرس کوتاه</th>
					<th>تعداد بازدید</th>
			</thead>
<?php
				
				
    $rows = $urlShortener->getAllLinks();
    while($row = $rows->fetch_object()){
	    echo "
<tr>
	<td>{$row->id}</td>
	<td>{$row->url}</td>
	<td><a href='/{$row->code}'>{$row->code}</a></td>
	<td>{$row->views}</td>
</tr>
";
    }

	
?>
		</table>
	</div>
</body>
</html>
