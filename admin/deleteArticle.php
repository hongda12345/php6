<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-02 17:42:27
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-02 17:59:16
 */
include '../libs/db.php';
$nid=$_GET['nid'];
$sql="select * from article where cid={$nid}";
$sql="delete from article where nid={$nid}";
$mysql->query($sql);
if($mysql->affected_rows){
    $message='栏目删除成功';
    $url='showArticle.php';
    include '../template/admin/message.html';
}else{
    $message='栏目删除失败';
    $url='showArticle.php';
    include '../template/admin/message.html';
}