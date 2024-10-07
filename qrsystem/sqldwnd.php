<html></html><?php
include_once('Mysqldump/Mysqldump.php');
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=qrsystem', 'root', '');
$f = date('d-m-Y');
$dump->start("backup/$f.sql");

echo '<script type="text/javascript">';
echo ' alert("The DataBase Has Been Downloaded...!!")'; 
echo '</script>';
?>