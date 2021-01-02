<?php 

/*
    简易转换器
*/

// 引入文件
$file = file_get_contents("text.md");

$names = preg_match_all("/\[[\ |\S]+\]/", $file, $matches, PREG_UNMATCHED_AS_NULL);
$urls = preg_match_all("/\]\((\ |\S)+\)/", $file, $matches2, PREG_UNMATCHED_AS_NULL);

$result = [];

foreach($matches[0] as $key => $item){
    array_push($result, array(
           "name" => preg_replace("/\[|\]/", "", $matches[0][$key]),
           "url" => preg_replace("/\]|\(|\)/", "", $matches2[0][$key])
       )
    );
}

echo json_encode($result, 320);
