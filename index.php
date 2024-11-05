<?php
$get = $_GET['get'];
$source = $_GET['source'] ?? 'astro'; // Default source is 'astro'

if ($source === 'astro') {
    $mpdUrl = 'https://linearjitp-playback.astro.com.my/dash-wv/linear/' . $get;
} elseif ($source === 'sky') {
    $mpdUrl = 'https://linear007-gb-dash1-prd-ak.cdn.skycdp.com/' . $get;
} else {
    echo "Error: Invalid source.";
    exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $mpdUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36"
]);

$res = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $res;
}
curl_close($ch);
?>
