<?php


namespace wulilele\zizaiyou\Obj;

/**
 * 订单列表查询接口
 * Class OrdersList
 * @package wulilele\zizaiyou\Obj
 */
class OrdersList
{
    /**
     * @var string 必须|固定值:orders_list
     */
    public $method = "orders_list";

    /**
     * @var string 返回文件格式,默认为json,可选参数:json,xml,php
     */
    public $format = "json";

    /**
     * @var int 列表页码,默认第一页
     */
    public $page = 1;

    /**
     * @var int 每页获取数量,默认每页15条
     */
    public $size = 15;

    /**
     * @var string 产品ID,缺省不做查询条件
     */
    public $item_id;

    /**
     * @var int 查询时间戳,与end连用,缺省默认为30天前时间戳
     */
    public $begin;

    /**
     * @var int 查询截止时间戳,与begin连用,缺省默认当前时间戳
     */
    public $end;

    /**
     * @var string 订单ID,用于获取确定的订单号,多个用英文逗号分隔
     */
    public $orders_id;
}