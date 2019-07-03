<?php


namespace wulilele\zizaiyou\Obj;

/**
 * 下单对象
 * Class ItemOrders
 * @package wulilele\zizaiyou\Obj
 */
class ItemOrders
{
    /**
     * @var string 必须|固定值:item_orders
     */
    public $method = "item_orders";

    /**
     * @var string 返回文件格式,默认为json,可选参数:json,xml,php
     */
    public $format = "json";

    /**
     * @var int 是否已付款:1已付款(创建订单同事发送门票短信);0未付款(只创建订单,确认付款请调用"修改订单接口")
     */
    public $is_pay = 1;

    /**
     * @var string 第三方订单ID,可避免网络不好使出现重复下单
     */
    public $orders_id;

    /**
     * @var int 必须|要购买的票ID
     */
    public $item_id;

    /**
     * @var int 购买票数量,缺省默认为1
     */
    public $size = 1;

    /**
     * @var string 必须|购票人姓名
     */
    public $name;

    /**
     * @var string 必须|购票人手机号(门票号码发送到该手机号)
     */
    public $mobile;

    /**
     * @var array 参团人员列表[["name":"姓名","Mobile":"手机号","Id_number":"身份证号"],["name":"姓名","Mobile":"手机号","Id_number":"身份证号"]];订单需要供多人使用时,可传入此名单供商家参考;注意:此参数与订单验证基本无关
     */
    public $players;

    /**
     * @var string 开始游玩日期,date类型,默认缺省当前时间
     */
    public $start_date;

    /**
     * @var int 价格类型: 1成人;2儿童;缺省值为1;(2013-10-28开始只接受1,不再支持其他类型)
     */
    public $price_type = 1;

    /**
     * @var string 订单备注
     */
    public $remark;

    /**
     * @var  string 产品单价(特殊系统需要,一般不传)
     */
    public $price;

    /**
     * @var string 返现金额(特殊系统需要,一般不传)
     */
    public $back_cash;

    /**
     * @var string 身份证号,是否需要提供由产品决定进行验证
     */
    public $id_number;

    /**
     * @var string 选择车次,是否需要由产品决定进行验证
     */
    public $csend_time;

}