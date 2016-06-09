<?php
include './Upload.class.php';
$file = $_FILES['file'];
$hander = new Upload();
$result = $hander->uploadOne($file);
if($result){
    echo json_encode(array(
        'code' => 0,
        'msg' => $result
    ));
}else{
    echo json_encode(array(
        'code' => 1,
        'msg' => $hander->getError()
    ));
}
