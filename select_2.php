<?php
    header('Content-type: application/json; charset=utf-8');
    $data = array();
    if(isset($_POST)){
        $data['msg'] = "1";  //ส่วนนี้จะเรียกว่า sub-function เป็นการใช้ฟังก์ชั่น สามารถประยุกต์ได้
    }else{
        $data['msg'] = "0";
    }
    echo json_encode($data);
?>
