<link rel="stylesheet" href="static/css/projects.css">

<?php
$project = [
    'bricks_miami.xml',
];

$offset = 0;
$limit = 10;

$project = array_slice($project, $offset, $limit);

foreach ($project as $url) {
    $xml = new DOMDocument();
    $xml->load(__DIR__ . '/xmls/' . $url);

    $xpath = new DOMXPath($xml);
    $name = $xpath->query('//name')->item(0)->nodeValue;
    $description = $xpath->query('//description')->item(0)->nodeValue;
    $date = $xpath->query('//date')->item(0)->nodeValue;

    echo '<div class="container-fluid mt-3 mb-3 p-2 project-item">';
        echo '<div class="project-title">' . $name . '</div>';
        echo '<div class="project-description">' . $description . '</div>';
        echo '<div class="project-date">' . $date . '</div>';
    echo '</div>';
}
?>
