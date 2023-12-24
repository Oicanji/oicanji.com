<link rel="stylesheet" href="static/css/projects.css">

<?php
$project = [
    'bricks_miami.xml',
];

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

$project = array_slice($project, $offset, $limit);

foreach ($project as $url) {
    $xml = new DOMDocument();
    $xml->load(__DIR__ . '/xmls/' . $url);

    echo '<div class="container-fluid mt-3 mb-3 p-2 project-item">';
    echo '<div class="project-title">' . $xml->saveXML($xml->getElementsByTagName('name')->item(0)) . '</div>';
    echo '<div class="project-description">' . $xml->saveXML($xml->getElementsByTagName('description')->item(0)) . '</div>';
    echo '<div class="project-content">' . $xml->saveXML($xml->getElementsByTagName('content')->item(0)) . '</div>';
    echo '<div class="project-date">' . $xml->saveXML($xml->getElementsByTagName('date')->item(0)) . '</div>';
    echo '</div>';
}
?>
