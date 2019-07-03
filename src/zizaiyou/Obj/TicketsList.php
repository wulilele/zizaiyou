<?php


namespace wulilele\zizaiyou\Obj;

/**
 * 门票列表接口查询对象
 * Class TicketsList
 * @package wulilele\zizaiyou\Obj
 */
class TicketsList
{
    /**
     * @var string 必须|固定值:item_list
     */
    public $method = "item_list";

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
     * @var int 产品分类ID,默认缺省获取所有所有分类产品
     */
    public $cate_id;

    /**
     * @var int 产品地区ID,默认不作条件
     */
    public $zone;

    /**
     * @var string 产品ID,用于获取确定的产品,多个产品ID用英文逗号分隔
     */
    public $item_id;

    /**
     * @var string 产品标题搜索关键词
     */
    public $key_word;

}