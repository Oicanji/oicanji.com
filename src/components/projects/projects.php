<?php
$project = [
    'bricks_miami.xml',
    'nft_generator.xml',
];

$offset = isset($_GET['offset']) ? filter_input(INPUT_GET, 'offset', FILTER_SANITIZE_URL) : 0;
$limit = isset($_GET['limit']) ? filter_input(INPUT_GET, 'limit', FILTER_SANITIZE_URL) : 10;

$project = array_slice($project, $offset, $limit);

foreach ($project as $url) {
    $xml = new DOMDocument();
    $xml->load(__DIR__ . '/xmls/' . $url);

    echo '<div class="container-fluid mt-3 mb-3 project-item">';
    echo '  <div class="row project-header">';
    echo '      <div class="col-2 col-lg-1 col-xl-2 project-image">' . $xml->saveXML($xml->getElementsByTagName('thumbnail')->item(0)) . '</div>';
    echo '      <div class="col-10 col-lg-11 col-xl-10 project-title"> <small>Projeto: </small> <br />' . $xml->saveXML($xml->getElementsByTagName('name')->item(0)) . '</div>';
    echo '  </div>';
    echo '  <div class="project-content mb-2">';
    echo        $xml->saveXML($xml->getElementsByTagName('description')->item(0));
    echo '  </div>';
    echo '  <div class="project-link">';
    echo '      <a href="#" onclick="event.preventDefault(); window.location.href=\'index.php?project&item=' . $url . '\'">Leer mais...</a>';
    echo '  </div>';
    echo '  <div class="project-date">' . $xml->saveXML($xml->getElementsByTagName('date')->item(0)) . '</div>';
    echo '</div>';
}
?>
