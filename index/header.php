<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-03 15:04:40
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-03 16:50:25
 */
include '../libs/db.php';
$nav=$mysql->query("select * from category")->fetch_all(MYSQL_ASSOC);
include '../template/index/header.html';