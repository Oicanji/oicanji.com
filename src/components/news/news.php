<link rel="stylesheet" href="static/css/news.css">

<?php
$news = [
    '2024/news_09-01.xml',
    '2024/news_02-01.xml',
    '2023/news_27-12.xml',
    '2023/news_24-12.xml',
];

$news_url = isset($_GET['news']) ? $_GET['news'] : null;

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;

$count_news = count($news);
$have_next = $offset + $limit < $count_news;

$news = array_slice($news, $offset, $limit);

$list = [];

foreach ($news as $url) {
    $xml = new DOMDocument();
    $xml->load(__DIR__ . '/xmls/' . $url);
    array_push($list, $xml);
}

echo '<div class="row m-0">';
echo '  <div class="col-12 col-md-4 list-container-news-list">';
require('src/components/news/listNews.php');

echo '  </div>';
echo '  <div class="col-12 col-md-8">';

if ($news_url) {
    echo '<div class="news-list-back">';
    //remover o ?news= da url só salvando a atual paginação
    echo '<a href="?offset=' . $offset . '&limit=' . $limit . '"class="btn btn-sm btn-primary"> <i class="fa-solid fa-arrow-left"></i> Voltar ao Início</a>';
    echo '</div>';
    $xml = new DOMDocument();
    $xml->load(__DIR__ . '/xmls/' . $news_url);
    echo '<div class="news news-item">';
    echo '<div class="news-title">' . $xml->saveXML($xml->getElementsByTagName('header')->item(0)) . '</div>';
    echo '<div class="news-content">' . $xml->saveXML($xml->getElementsByTagName('content')->item(0)) . '</div>';

    $article = $xml->getElementsByTagName('article')->item(0);
    if ($article) {
        echo '<hr />';
        echo '<div class="news-article">' . $xml->saveXML($article) . '</div>';
    }
    
    echo '</div>';
    echo '<div class="news-footer">' . $xml->saveXML($xml->getElementsByTagName('footer')->item(0)) . '</div>';

    echo '  </div>';
    echo '</div>';
    return;
}

$i = 0;
for ($i = 0; $i < count($list); $i++) {
    echo '<div class="news news-item">';
    echo '<div class="news-title">' . $list[$i]->saveXML($list[$i]->getElementsByTagName('header')->item(0)) . '</div>';
    echo '<div class="news-content">' . $list[$i]->saveXML($list[$i]->getElementsByTagName('content')->item(0)) . '</div>';
    $article = $list[$i]->getElementsByTagName('article')->item(0);
    if ($article) {
        echo '<hr />';
        echo '<div class="text-center"><a href="?news=' . $news[$i] . '"class="text-primary">Ler mais o Artigo <i class="fa-solid fa-magnifying-glass"></i></a></div>';
    }
    echo '<div class="news-footer">' . $list[$i]->saveXML($list[$i]->getElementsByTagName('footer')->item(0)) . '</div>';
    echo '</div>';
}
echo '  </div>';

require('src/components/pagination/pagination.php');

echo '</div>';
?>
