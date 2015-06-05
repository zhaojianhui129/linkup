<?php
/**
 * 判断是否为ajax请求
 * @return boolean
 */
function isAjax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

/**
 * 获取请求类型
 * @return boolean
 */
function ajaxType(){
    switch ($_SERVER['HTTP_ACCEPT']){
        case 'application/json, text/javascript, */*':
            //  JSON 格式
            return 'json';
            break;
        case 'text/javascript, application/javascript, */*':
            // javascript 或 JSONP 格式
            return 'jsonp';
            break;
        case 'text/html, */*':
            //  HTML 格式
            return 'html';
            break;
        case 'application/xml, text/xml, */*':
            //  XML 格式
            return 'xml';
            break;
    }
}
/**
 * 规范json返回格式
 * @param number $statusCode 状态码(1:成功,2:错误,3:消息提醒)
 * @param string $message 提示信息
 * @param array $data 返回数据
 * @return string
 */
function ajaxFormat($statusCode = 1,$message = '',$data = array()){
    $data = array('statusCode'=>$statusCode, 'message' => $message, 'data'=>$data);
    return $data;
}