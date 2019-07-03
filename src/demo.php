<?php

use wulilele\zizaiyou\Lite;

require_once "zizaiyou/Lite.php";
require_once "zizaiyou/Obj/TicketsList.php";
require_once "zizaiyou/Obj/OrdersList.php";
require_once "zizaiyou/Obj/ItemOrders.php";

$config = [
    'pid' => "合作伙伴id",
    'authcode' => "授权码",
    'apiurl' => "接口域名"
];

$lite = new Lite($config);

//1.获取门票列表
$ticketsListData = new \wulilele\zizaiyou\Obj\TicketsList();
//可指定特定查询参数
$result = $lite->postData($ticketsListData);
var_dump($result);

//2.获取订单列表
//$orderList = new \wulilele\zizaiyou\Obj\OrdersList();
//可指定特定查询参数
//$result = $lite->postData($orderList);
//var_dump($result);

//3.下单接口
//$itemOrders = new \wulilele\zizaiyou\Obj\ItemOrders();
//必须指定下单参数,示例
//$itemOrders->id_number = "shenfenzhenghao";
//$itemOrders->name = "姓名";
//$result = $lite->postData($itemOrders);
//var_dump($result);



