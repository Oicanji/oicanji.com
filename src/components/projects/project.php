<?php

if (!isset($_GET['item'])) {
    header('Location: index.php');
    exit();
}

$url = filter_input(INPUT_GET, 'item', FILTER_SANITIZE_URL);

$xml = new DOMDocument();
$xml->load(__DIR__ . '/xmls/' . $url);

if (!$xml) {
    header('Location: index.php');
    exit();
}

echo '<div class="container-fluid mt-3 mb-3 project-item">';
echo '  <div class="row project-header">';
echo '      <div class="col-2 col-md-1 col-xl-1 project-image">' . $xml->saveXML($xml->getElementsByTagName('thumbnail')->item(0)) . '</div>';
echo '      <div class="col-10 col-md-11 col-xl-11 project-title"> ' . $xml->saveXML($xml->getElementsByTagName('name')->item(0)) . '</div>';
echo '  </div>';
echo '  <div class="project-subheader row">';
echo '      <div class="project-links col-sm-12 col-md-8">';
echo            $xml->saveXML($xml->getElementsByTagName('link')->item(0));
echo '      </div>';
echo '      <div class="project-date col-sm-12 col-md-4">';
echo            $xml->saveXML($xml->getElementsByTagName('date')->item(0));
echo '      </div>';
echo '  </div>';
echo '  <div class="project-content mb-2">';
echo        $xml->saveXML($xml->getElementsByTagName('content')->item(0));
echo '  </div>';
echo '</div>';