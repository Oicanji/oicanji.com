<?php

echo '<hr class="mt-3" />';
echo '<nav aria-label="Page navigation example">';
echo '<ul class="pagination justify-content-center">';
echo '<li class="page-item ' . ($offset == 0 ? 'disabled' : '') . '">';
echo '<a class="page-link" href="?offset=' . max(0, $offset - $limit) . '&limit=' . $limit . '" tabindex="-1">Previous</a>';
echo '</li>';

$totalPages = $count_news / $limit;


for ($i = 0; $i < $totalPages; $i++) {
    $page = $i + 1;
    $pageOffset = $i * $limit;

    echo '<li class="page-item ' . ($offset == $pageOffset ? 'active' : '') . '">';
    echo '<a class="page-link" href="?offset=' . $pageOffset . '&limit=' . $limit . '">' . $page . '</a>';
    echo '</li>';
}

echo '<li class="page-item ' . (!$have_next ? 'disabled' : '') . '">';
echo '<a class="page-link" href="?offset=' . ($offset + $limit) . '&limit=' . $limit . '">Next</a>';
echo '</li>';
echo '</ul>';
echo '</nav>';

?>