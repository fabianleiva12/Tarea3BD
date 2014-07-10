<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Boomer" />

	<title>conectando a base de dato</title>
</head>

<body>
<?php 
require_once("class/class.php"); 
$campus=new Campus();
$a=$campus->get_campus();
?>
<h1>Listado campus</h1>


<?php
for($i=0;$i<sizeof($a);$i++)
{?>
    <li><?php echo $a[$i]["nombre_campus"] ;?><br /><hr /></li>
<?php
}
?>




</body>
</html>