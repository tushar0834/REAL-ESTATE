<?php // demo/temp_leovipin2.php
/**
 * https://www.experts-exchange.com/questions/28940091/Display-Image-stored-in-Database-using-PHP.html
 */
error_reporting(E_ALL);

// TRY TO CONNECT TO THE DB SERVER
$connect=require('db.php');
if (!$connect) trigger_error('CONNECT FAIL', E_USER_ERROR);

// TRY TO SELECT THE DATABASE
$select=mysqli_select_db('hrm',$connect);
if (!$select) trigger_error('SELECT FAIL', E_USER_ERROR);

// TRY TO RUN A QUERY
$sql='SELECT * FROM images ';
$res=mysqli_query($sql);
if (!$res) trigger_error('QUERY FAIL', E_USER_ERROR);

// TRY TO RETRIEVE A ROW
$row = mysql_fetch_assoc($res);
if (!$row) trigger_error('FETCH FAIL', E_USER_ERROR);

$content = $row['staff_picture'];
header('Content-type: image/jpeg');
echo $content;