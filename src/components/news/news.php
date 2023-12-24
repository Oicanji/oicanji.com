<link rel="stylesheet" href="static/css/news.css">

<?php
$news = [
    '2023/news_24-12.xml',
];

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

$news = array_slice($news, $offset, $limit);

foreach ($news as $url) {
    $xml = new DOMDocument();
    $xml->load(__DIR__ . '/xmls/' . $url);

    echo '<div class="container news mt-3 mb-3 p-4 news-item">';
    echo '<div class="news-title">' . $xml->saveXML($xml->getElementsByTagName('header')->item(0)) . '</div>';
    echo '<div class="news-content">' . $xml->saveXML($xml->getElementsByTagName('content')->item(0)) . '</div>';
    echo '<div class="news-footer">' . $xml->saveXML($xml->getElementsByTagName('footer')->item(0)) . '</div>';
    echo '</div>';
}
?>
