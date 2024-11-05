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

$mpdheads = [
  'http' => [
      'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\r\n",
      'follow_location' => 1,
      'timeout' => 5
  ]
];
$context = stream_context_create($mpdheads);

// Attempt to fetch the MPD content
$res = file_get_contents($mpdUrl, false, $context);

if ($res === FALSE) {
    echo 'Error: Unable to retrieve content.';
} else {
    echo $res;
}
?>
