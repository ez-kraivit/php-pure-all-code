<?php
    header('Content-type: application/json; charset=utf-8');
    $data = array();
    if(isset($_POST)){
        $data['msg'] = $_POST['check1'];
    }else{
        $data['msg'] = "0";
    }
    echo json_encode($data);
?>