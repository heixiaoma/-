<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/1/5
 * Time: 21:16
 */

if($_GET['json']=='json'){
    $adder = "map.temp";
    $myfile = fopen($adder, "r") or die("无相关信息");
    $res = fread($myfile, filesize($adder));
    echo $res;
}