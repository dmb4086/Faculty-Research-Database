<?php

 $path = './';
require $path."../../../dbConnect.inc";

if($mysqli){

    if (isset($_GET['name'])) {

        $name = $_GET['name'];
        $email = $_GET['email'];
        $keyword = $_GET['keyword'];
        $description = $_GET['description'];
        $StudentFlag = $_GET['StudentFlag'];
        $type = $_GET['type'];



        echo "name: ".$name." Email: ".$email." keyword: ".$keyword;
    }

}






?>
