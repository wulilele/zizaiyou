<?php


namespace wulilele\zizaiyou\Obj;

/**
 * 退票接口
 * @desc 如果对应的订单退票许可状态为"管理员审核退票",则接口为"申请退票接口"
 * 申请退票成功不代表退票成功
 * Class ItemRefund
 * @package wulilele\zizaiyou\Obj
 */
class ItemRefund
{

    /**
     * @var string 必须|固定值:item_refund
     */
    public $method = "item_refund";

    /**
     * @var string 返回文件格式,默认为json,可选参数:json,xml,php
     */
    public $format = "json";

    /**
     * @var string 必须|要退票的订单号
     */
    public $orders_id;

    /**
     * @var int 退票数量,缺省值默认为所有未使用票数
     */
    public $size;
}