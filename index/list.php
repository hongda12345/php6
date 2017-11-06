<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-03 16:58:44
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-06 19:25:22
 */
header('Content-type:text/html; charset=utf8');
include 'header.php';
include 'ban.php';
$cid=$_GET['cid'];
$sql="select template,cname from category where cid={$cid}";
$data=$mysql->query($sql)->fetch_assoc();
$template=$data['template'];
$cname=$data['cname'];
$sql="select * from article where cid={$cid}";
$list=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
include '../template/index/'.$template;
include 'footer.php';