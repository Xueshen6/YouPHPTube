<?php
require_once 'comment.php';
header('Content-Type: application/json');
$categories = Comment::getAllComments($_GET['video_id']);
$total = Comment::getTotalComments($_GET['video_id']);
foreach ($categories as $key => $value) {
    $name = empty($value['name'])?substr($value['user'], 0,5)."...":$value['name'];
    $categories[$key]['comment'] = " <div class=\"commenterName\"><strong>{$name}</strong><div class=\"date sub-text\">{$value['created']}</div></div><div class=\"commentText\">". nl2br($value['comment'])."</div>";
}


echo '{  "current": '.$_POST['current'].',"rowCount": '.$_POST['rowCount'].', "total": '.$total.', "rows":'. json_encode($categories).'}';