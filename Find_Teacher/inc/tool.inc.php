<?php
    function skip($url,$pic,$message){
$html=<<<A
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="3;URL={$url}" />
<title>正在跳转中</title>
<link rel="stylesheet" type="text/css" href="style/remind.css" />
</head>
<body>
<div class="notice"><span class="pic {$pic}"></span>{$message} <a href="{$url}">3秒后自动跳转！</a></div>
</body>
</html>
A;
        echo($html);
    }
    function is_login($link){
        if(isset($_COOKIE['zjx']['name'])&&isset($_COOKIE['zjx']['pw'])){
            $query="select * from member where name='{$_COOKIE['zjx']['name']}' and sha1(pw)='{$_COOKIE['zjx']['pw']}'";
            $result=execute($link,$query);
            if(mysqli_num_rows($result)==1){
                $data=mysqli_fetch_assoc($result);
                return $data['id'];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    function check_user($member_id,$content_member_id){
        if($member_id==$content_member_id){
            return true;
        }else{
            return false;
        }
    }
?>