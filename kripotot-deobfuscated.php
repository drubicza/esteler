<?php
set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
error_reporting(1);

function get_between($string, $start, $end)
{
    $string = " ".$string;
    $ini    = strpos($string,$start);

    if ($ini == 0) return "";

    $ini += strlen($start);
    $len  = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}

function login($obid, $loginuth)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://cryptopop-ec1c1.firebaseio.com/CoinbaseUsers/'.$obid.'/.json?print=pretty&auth='.$loginuth.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "");
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Accept: */*';
    $headers[] = 'Cache-Control: no-cache';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Host: cryptopop-ec1c1.firebaseio.com';
    $headers[] = 'User-Agent: Firebase/5/3.0.0/28/Android';
    $headers[] = 'cache-control: no-cache';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        return 'ALFREDO GANTENG';
    }

    curl_close ($ch);
    return $result;
}

function gandakan($obid, $crd, $data, $pnjg)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://cryptopop-ec1c1.firebaseio.com/CoinbaseUsers/'.$obid.'/.json?print=pretty&auth='.$crd.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ''.$data.'');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Content-Length: '.$pnjg.'';
    $headers[] = 'Content-Type: application/json; charset=utf-8';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close ($ch);
    return $result;
}

function balance($obid, $loginuth)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://cryptopop-ec1c1.firebaseio.com/CoinbaseUsers/'.$obid.'/gwei_accu/.json?print=pretty&auth='.$loginuth.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "");
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Accept: */*';
    $headers[] = 'Cache-Control: no-cache';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Host: cryptopop-ec1c1.firebaseio.com';
    $headers[] = 'User-Agent: Firebase/5/3.0.0/28/Android';
    $headers[] = 'cache-control: no-cache';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        return 'ALFREDO GANTENG';
    }

    curl_close ($ch);
    return $result;
}

$end        = "\033[0m";
$black      = "\033[0;30m";
$blackb     = "\033[1;30m";
$white      = "\033[0;37m";
$whiteb     = "\033[1;37m";
$red        = "\033[0;31m";
$redb       = "\033[1;31m";
$green      = "\033[0;32m";
$greenb     = "\033[1;32m";
$yellow     = "\033[0;33m";
$yellowb    = "\033[1;33m";
$blue       = "\033[0;34m";
$blueb      = "\033[1;34m";
$purple     = "\033[0;35m";
$purpleb    = "\033[1;35m";
$lightblue  = "\033[0;36m";
$lightblueb = "\033[1;36m";
$banner     = "{$lightblueb}
==================================================
   ___                 _
  / __\ __ _   _ _ __ | |_ ___  _ __   ___  _ __
 / / | '__| | | | '_ \| __/ _ \| '_ \ / _ \| '_ \
/ /__| |  | |_| | |_) | || (_) | |_) | (_) | |_) |
\____/_|   \__, | .__/ \__\___/| .__/ \___/| .__/
           |___/|_|            |_|         |_|
=================================================={$end}
{$greenb}Author By{$end}  : {$yellowb}Cornelius Alfredo{$end}         | {$greenb}Bot Cryptopop{$end}
{$greenb}Channel Telegram{$end}: {$purpleb}#SaveReceh {$end}          | {$greenb}Jangan Lupa Subscribe Channel Telegram biar ga ketinggalan Info ^^
{$end}";

system(clear);
echo $banner;
exec("termux-open-url https://t.me/joinchat/AAAAAFUgvj3E7Wy6S32uQg");

echo "{$lightblueb}Masukkan ObjectID : {$end}";
$obid = trim(fgets(STDIN));

exec("termux-open-url https://www.youtube.com/channel/UC2dUZ1YCv2LeKWplJdlWS3w");

echo "{$lightblueb}Masukkan cred : {$end}";
$cred  = trim(fgets(STDIN));
$login = json_decode(login($obid,$cred));

if ($login->error == TRUE) {
    print"{$greenb}[".date('G:i:s')."]{$end} - {$redb}Masukan data yang valid.{$end}\r\n";
    exec("termux-open-url https://t.me/joinchat/AAAAAFUgvj3E7Wy6S32uQg");
} else {
    exec("termux-open-url https://t.me/joinchat/AAAAAFUgvj3E7Wy6S32uQg");
    print"{$greenb}[".date('G:i:s')."]{$end} - {$lightblueb}Anda berhasil masuk . .  .{$end}\n";
    print"{$greenb}[".date('G:i:s')."]{$end} - {$purple}GWEI anda sekarang {$login->gwei_accu} . .  .{$end}\n";
    while (true) {
        $data    = json_decode(login($obid,$cred));
        $z       = json_encode(array("email" => $data->email, "gwei_accu" => $data->gwei_accu + 50 * rand(1, 10), "gwei_total_claimed" => $data->gwei_total_claimed, "last_claimed" => $data->last_claimed, "objectId" => $data->objectId, "score" => $data->score));
        $panjang = strlen($z);
        $ganda   = json_decode(gandakan($obid, $cred, $z, $panjang));

        if ($ganda->gwei_accu == TRUE) {
            print"{$greenb}[".date('G:i:s')."]{$end} - {$lightblueb}GWEI BALANCE NOW {$ganda->gwei_accu}{$end}\n";
            sleep(20);
        } else {
            print"{$greenb}[".date('G:i:s')."]{$end} - {$redb}Run ulang, GWEI tidak bisa di claim.{$end}\n";
            exit();
        }
    }
}
?>
