<?php
namespace wulilele\zizaiyou;

use wulilele\zizaiyou\Obj\TicketsList;

class Lite
{
    /**
     * 合作伙伴id
     * @var string
     */
    protected $pid = "";

    /**
     * 授权码
     * @var string
     */
    protected $authcode = "";

    /**
     * 接口域名
     * @var string
     */
    protected $apiurl = "";

    /**
     * Lite constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->pid = isset($config['pid']) ? $config['pid'] : "";
        $this->authcode = isset($config['authcode']) ? $config['authcode'] : "";
        $this->apiurl = isset($config['apiurl']) ? $config['apiurl'] : "";
    }

    /**
     * 接口统一调用方法
     * @param $obj  object 查询对象
     * @param string $path 接口地址相对路径
     * @return bool|string 返回信息字段详见接口文档
     */
    public function postData($obj,$path = "/Api/seller/api.php"){
        $url = $this->apiurl . $path;
        //参数对象转数组,并移除空值
        $arr =  (array)$obj;
        foreach ($arr as $k => $v){
            if($v == null){
                unset($arr[$k]);
            }
        }
        //进行参数签名
        $query_data = $this->make_sign($arr);
        $response = $this->curlPost($url,$query_data);
        return $response;
    }

    /**
     * 生成带签名的post参数
     * @param $param array post参数
     * @return mixed
     */
    public function  make_sign($param){
        $arr = $param;  //保存原始参数
        $param['_pid'] = $this->pid;
        ksort($param);  //排序
        $query = $this->authcode;
        foreach ($param as $key => $val){
            //判断数组参数转换为字符串进行签名计算
            if(is_array($val)){
                $query_val = "[";
                foreach ($val as $k => $v){
                    ksort($v);
                    $str = http_build_query($v);
                    $query_val .= $k . "=" ."[". $str . "]&";
                }
                $query_val = substr($query_val,-1,strlen($query_val) -1);   //去掉尾部多余的&符号
                $val = $query_val . "]";
            }
            $query .= "&" . $key . "=" . $val;
        }
        $query .= "&" . $this->authcode;
        $sign = strtoupper(md5($query));    //md5转大写
        $arr['_sig'] = $sign;   //签名
        $arr['_pid'] = $this->pid;  //合作伙伴id
        return $arr;
    }

    /**
     * http curl post
     * @param $url string 请求url
     * @param $data array 请求参数
     * @param int $timeout 超时时间
     * @return bool|string
     */
    public function curlPost($url,$data,$timeout = 60){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}