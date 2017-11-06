<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-01 13:28:57
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-02 17:51:30
 */
include '../libs/db.php';
$cid=$_GET['cid'];
$sql="select * from category where pid={$cid}";
if($mysql->query($sql)->fetch_assoc()){
    $message='存在子栏目';
    $url='showCategory.php';
    include '../template/admin/message.html';
    exit();
}
$sql="delete from category where cid={$cid}";
$mysql->query($sql);
if($mysql->affected_rows){
    $message='栏目删除成功';
    $url='showCategory.php';
    include '../template/admin/message.html';
}else{
    $message='栏目删除失败';
    $url='showCategory.php';
    include '../template/admin/message.html';
}