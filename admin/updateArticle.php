<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-02 18:01:51
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-05 19:02:23
 */
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $nid=$_GET['nid'];
    $cate = new unit();
    $cate->model='article';
    $option=$cate->cateTree(0,$mysql,'category',0);  
    $title=$cate->selectTwo($mysql,'article',$nid,'title');
    $description=$cate->selectTwo($mysql,'article',$nid,'description');
    $content=$cate->selectTwo($mysql,'article',$nid,'content');
    $src=$cate->selectTwo($mysql,'article',$nid,'thumb');
    include '../template/admin/updateArticle.html';
}else{
    include '../libs/db.php';
    $nid=$_POST['nid'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $content=$_POST['content'];
    $cid=$_POST['cid'];
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
    $sql="update article set title='{$title}',description='{$description}',content='{$content}',thumb='{$src}',cid='{$cid}' where nid='{$nid}'";
    $mysql->query($sql);
    if($mysql->affected_rows){
        $message='栏目修改成功';
        $url='showArticle.php';
        include '../template/admin/message.html';
    }else{
        $message='栏目修改失败';
        $url='showArticle.php';
        include '../template/admin/message.html';
    }
}