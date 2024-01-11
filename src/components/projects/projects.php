<?php
$project = [
    'gamsources.xml',
    'bricks_miami.xml',
    'the_last_crimson.xml',
    'wandness.xml',
    'meets_laura.xml',
    'tiermatch.xml',
    'conditional_sprites.xml',
    'nft_generator.xml',
];

$offset = isset($_GET['offset']) ? filter_input(INPUT_GET, 'offset', FILTER_SANITIZE_URL) : 0;
$limit = isset($_GET['limit']) ? filter_input(INPUT_GET, 'limit', FILTER_SANITIZE_URL) : 10;

$project = array_slice($project, $offset, $limit);
foreach ($project as $url) {
    $xml = new DOMDocument();
    $xml->load(__DIR__ . '/xmls/' . $url);

    $thumbnail = $xml->getElementsByTagName('thumbnail')->item(0);
    $thumbnailImg = $thumbnail->getElementsByTagName('img')->item(0)->getAttribute('src');
    $name = $xml->getElementsByTagName('name')->item(0)->nodeValue;
    $description = $xml->getElementsByTagName('description')->item(0)->nodeValue;

    echo '<div class="container-fluid mt-3 mb-3 project-item">';
    echo '  <div class="row project-header">';
    echo '      <div class="col-2 col-lg-1 col-xl-2 project-image"><img src="' . $thumbnailImg . '" style="width: 100%; height: auto;"></div>';
    echo '      <div class="col-10 col-lg-11 col-xl-10 project-title"> <small>Projeto: </small> <br />' . $name . '</div>';
    echo '  </div>';
    echo '  <div class="project-content mb-2">';
    echo        $description;
    echo '  </div>';
    echo '  <div class="project-link">';
    echo '      <a href="#" onclick="event.preventDefault(); window.location.href=\'index.php?project&item=' . $url . '\'">Leer mais...</a>';
    echo '  </div>';
    echo '</div>';
}


?>
