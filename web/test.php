<!DOCTYPE html>
<html>
<body>

<?php

require_once(__DIR__ . "/action.php");
define("APPID", "dingoazrfhph83jpvlqdnu");
define("APPSECRET", "0L7-gNF8s7IeCUw57VJiSPUiw5YjqMZRNeNwqtWxwdtqxERNP5zozy4VqXzHCKET");

$origin_url = "https://oapi.dingtalk.com/sns/gettoken";
$access_token_url = $origin_url . "?appid=" . APPID . "&appsecret=" . APPSECRET;

echo "access_token_url=" . $access_token_url . "<br>";
echo "<br>";

$action = new Action();

if (isset($_GET["code"])) {
    $code = $_GET["code"];
    echo "tmp_auth_code=" . $code . "<br>";
    // GET 获取access_token
    $context1 = $action->curl_get_https($access_token_url);
    $json_data = json_decode($context1);

    $access_token_code = $json_data->access_token;
    echo "access_token_code = " . $access_token_code . "<br>";

    //POST 获取持久授权码
    $data_origin = array("tmp_auth_code" => $code);

    $persistent_code_url = "https://oapi.dingtalk.com/sns/get_persistent_code?access_token=" . $access_token_code;


    $context = $action->curl_post_https($persistent_code_url, $data_origin);
    $persistent_code_json = json_decode($context);

    var_dump($persistent_code_json);

    $errcode = $persistent_code_json->errcode;
    $errmsg = $persistent_code_json->errmsg;

    $persistent_code = $persistent_code_json->persistent_code;
    $open_id = $persistent_code_json->openid;
    $unionid = $persistent_code_json->unionid;

    echo "persistent_code = " . $persistent_code . "<br>";
    echo "open_id = " . $open_id . "<br>";
    echo "unionid= " . $unionid;

    // POST 获取该用户授权的SNS_TOKEN

    $snstoken_url = "https://oapi.dingtalk.com/sns/get_sns_token?access_token=" . $access_token_code;
    $snstoken_data_origin = array("openid" => $open_id, "persistent_code" => $persistent_code);

    $context = $action->curl_post_https($snstoken_url, $snstoken_data_origin);

    $snstoken_return_json = json_decode($context);
    $snstoken_data_snstokencode = $snstoken_return_json->sns_token;

    // GET 获取用户个人信息

    $userinfo_url = "https://oapi.dingtalk.com/sns/getuserinfo?sns_token=" . $snstoken_data_snstokencode;
    $context = $action->curl_get_https($userinfo_url);

    $userinfo_return_json = json_decode($context);
    var_dump($userinfo_return_json);

    $userinfo_return_nick = $userinfo_return_json->user_info->nick;
    echo "hello " . $userinfo_return_nick . "!";

}

echo "<br>";

if (isset($_GET["state"])) {
    $state = $_GET["state"];
    echo $state . "<br>";
}

echo "<br> -- -- - -- -- - -- - -- - --- -" . "<br>";

echo "<a href=\"https://oapi.dingtalk.com/connect/qrconnect?appid=dingoazrfhph83jpvlqdnu&response_type=code&scope=snsapi_login&state=STATE&redirect_uri=http:%2F%2F7xmtvb.natappfree.cc%2Ftest.php\">dingding</a>"

?>


</body>
</html>
