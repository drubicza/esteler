<?php
$banner = "\033[1;33m
[•]######################[•]
\033[1;33m[•] Subscribe  : AW 2000 [•]
\033[1;33m[•] Channel Yt : AW 2000 [•]
\033[1;33m[•] APK Free XLM Game    [•]
[•]######################[•]\n\n";

date_default_timezone_set('Asia/Jakarta');

echo"\033[1;34m[".date('l, d-m-Y <•> h:i:s a')."]\n";
echo $banner;

echo "\033[1;32mEnter Your Bareer\033[1;31m :\033[1;0m ";
$barr = trim(fgets(STDIN));

echo "\033[1;32mEnter Your x-api-key\033[1;31m :\033[1;0m ";
$token = trim(fgets(STDIN));

sleep(2);
system("clear");
echo $banner;
echo "\033[1;33mLogin ";
sleep(1);
echo "\033[1;0m•";
sleep(1);
echo "\033[1;0m•";

// Cek Ballance
$link = "https://wklta3no6f.execute-api.us-east-1.amazonaws.com/prod/v1/me/balance";
$ua   = array("authorization: ".$barr,"x-api-key: ".$token,"user-agent: okhttp/3.10.0");
$ch   = curl_init();
curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
$respon = curl_exec($ch);
curl_close($ch);
$json   = json_decode($respon, true);

if ($json["coins"] == true) {
    sleep(1);
    echo "\033[1;0m•";
    sleep(1);
    echo "\033[1;0m•\n";
    echo "\033[1;32mLogin Success\n";
    date_default_timezone_set('Asia/Jakarta');
    echo"\033[1;34m[".date('l, d-m-Y <•> h:i:s a')."]\n";
    echo "\033[1;32mCoin\033[1;31m  : \033[1;0m".$json["coins"]." XLM\n";
    echo "\033[1;32mPower\033[1;31m : \033[1;0m".$json["power"]."\n";
} else {
    sleep(1);
    echo "\033[1;0m•";
    sleep(1);
    echo "\033[1;0m•\n";
    echo "\033[1;31mLogin Filed\033[1;0m\nCheck Your Config\n";
    exit();
}

echo "\n\n\n\033[1;33mWaiting bro.....!\n";

while (True) {
    $play = "https://wklta3no6f.execute-api.us-east-1.amazonaws.com/prod/v1/letsplay";
    $ch   = curl_init();
    curl_setopt($ch, CURLOPT_URL, $play);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
    $res = curl_exec($ch);
    curl_close($ch);
    $jsn = json_decode($res, true);

    if ($jsn["nopower"] == true) {
        echo "\033[1;31mYour Power Is Low\n";
        break;
    }

    sleep(10);
    $data    = array("hash" => $jsn["uuid"],"timetoplay" => $jsn["timetoplay"]);
    $data1   = json_encode($data, true);
    $confirm = "https://wklta3no6f.execute-api.us-east-1.amazonaws.com/prod/v1/letsplay/confirmed";
    $ch      = curl_init();
    curl_setopt($ch, CURLOPT_URL, $confirm);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("accept: application/json, text/plain, */*","authorization: ".$barr,"x-api-key: ".$token,"content-type: application/json;charset=utf-8","user-agent: okhttp/3.10.0"));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    $result = curl_exec($ch);
    curl_close($ch);
    $js     = json_decode($result, true);

    if ($js["success"] == true) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
        $respon = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($respon, true);

        if ($json["power"] < 1000) {
            date_default_timezone_set('Asia/Jakarta');
            echo"\033[1;34m[".date('l, d-m-Y <•> h:i:s a')."]\033[1;32mSuccess•\033[1;0m ".$jsn["amount"]." \033[1;31m[\033[1;0m ".$json["coins"]." XLM]\n";

            echo "\033[1;31mYour Power Is Low\n";
            cash($ua);
        } else {
            date_default_timezone_set('Asia/Jakarta');
            echo"\033[1;34m[".date('l, d-m-Y <•> h:i:s a')."]\033[1;32mSuccess•\033[1;0m ".$jsn["amount"]." \033[1;31m[\033[1;0m ".$json["coins"]." XLM]\n";
            sleep(20);
        }
    }
}

function cash($ua)
{
    $k = 0;

    while (True) {
        $k++;
        $url = "https://wklta3no6f.execute-api.us-east-1.amazonaws.com/prod/v1/letsplay/bonus";
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
        $result = curl_exec($ch);
        curl_close($ch);
        echo $result."\n";
        if ($k == 2) break;
        sleep(30);
    }
}
?>
