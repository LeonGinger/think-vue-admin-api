<?php
/**
 * Created by PhpStorm.
 * User: surest : http://surest.cn
 * Date: 19-7-23
 * Time: 上午10:33
 */

namespace app\common\server;


use think\exception\HttpResponseException;
use think\Request;
use think\response\Json as JsonResponse;

class CrossDomain
{
    /**
     * 跨域问题解决
     * Credentials: true
     */
    public static function credentials()
    {
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '*';
        header("Access-Control-Allow-Origin: $origin");
//        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, X-Requested-With');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, OPTIONS, PUT, DELETE');
        header('Access-Control-Max-Age: 1728000');
    }

    /**
     * 跨域问题解决
     * 匹配所有的时候
     */
    public static function any()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, X-Requested-With');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS , PATCH, PUT, DELETE');
        header('Access-Control-Max-Age: 1728000');

        if($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
            $response = JsonResponse::create([], 'json', 200);
            throw new HttpResponseException($response);
        }
    }
}
