<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-02 09:42:25
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-02 13:05:49
 */
$file=$_FILES['img'];
if(is_uploaded_file($file['tmp_name'])){
    if(!file_exists('upload')){
        mkdir('upload');
    }
    $path='upload/' .date('y-m-d');
    if(!file_exists($path)){
        mkdir($path);
    }
    $imgpath=$path . '/' . $file['name'];
    $src='/php/villa/demo/' . $imgpath;
    move_uploaded_file($file['tmp_name'],$imgpath);
    echo "<img src='{$src}'/>";
}
