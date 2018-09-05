<?php
define("ROOT_DIR",dirname(__FILE__));
require(ROOT_DIR.'/printer.class.php');
$_POST= [
	'name' => '祝亚辉',
	'company' => 'msup',
	'barcode' => 'http://www.msup.com.cn',
	'ticketTitle' => '通票',
	'mark' => '7号'
];
if(!isset($_POST) || empty($_POST['name']) || empty($_POST['company'])){
	echo json_encode(['errno'=>'1','errmsg'=>'未指定参数']);
	exit;
}else{
	$number = isset($_POST['number'])?$_POST['number']:1;
	$name =  $_POST['name'];
	$barcode = isset($_POST['barcode']) ? $_POST['barcode']:'通票';
	$ticketTitle = isset($_POST['ticketTitle']) ? $_POST['ticketTitle']:'通票';
	$mark = isset($_POST['mark']) ? $_POST['mark']:null;
	$printer = new Printer($name,  $ticketTitle, $barcode, $mark);
	$printer->start();
}

?>