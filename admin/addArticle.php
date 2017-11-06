<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-02 11:47:09
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-06 16:16:28
 */
header('Content-type:text/html; charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/function.php';
    $cate=new unit();
    $option=$cate->cateTree(0,$mysql,'category',0);
    include '../template/admin/addArticle.html';
}else{

    //要插入的数据
    $cid=$_POST['cid'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $content=$_POST['content'];

    $src='';//连接进入数据库所需的路径定义

    $file=$_FILES['img'];
    if(is_uploaded_file($file['tmp_name'])){
        //相对路径 '../static/upload'

        if(!file_exists('../static/upload')){  //upload为文件夹的名字
            //创建文件夹    0777为权限   true为创建多级目录
            mkdir('../static/upload',0777,true);
        }
        $path='../static/upload' . date('y-m-d');
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath=$path .'/'. $file['name'];
        move_uploaded_file($file['tmp_name'],$imgPath);  //要移动的文件   路劲

        $src='/php/villa/' . substr($imgPath,3);//截取的字符串  截取的开始位置  截取的长度
//        echo $src;
    }

    $sql="insert into article (cid,title,description,content,thumb) 
         values ($cid,'{$title}','{$description}','{$content}','{$src}')";
//    echo $sql;
    $mysql->query($sql);
    if($mysql->affected_rows){
        $message='内容插入成功';
        $url='showArticle.php';
    }else{
        $message='内容插入失败';
        $url='addArticle.php';
    }
    include '../template/admin/message.html';
}