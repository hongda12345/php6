<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-02 11:47:31
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-03 10:20:43
 */
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    // 显示页面 include引进页面
    include '../libs/db.php';
    include '../libs/function.php';
    $cate = new unit();
    $option=$cate->artTable($mysql,'article');
    include '../template/admin/showArticle.html';
}else{

}