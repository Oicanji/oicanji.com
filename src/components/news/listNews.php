<?php 

$months = [
    '01' => 'Janeiro',
    '02' => 'Fevereiro',
    '03' => 'Março',
    '04' => 'Abril',
    '05' => 'Maio',
    '06' => 'Junho',
    '07' => 'Julho',
    '08' => 'Agosto',
    '09' => 'Setembro',
    '10' => 'Outubro',
    '11' => 'Novembro',
    '12' => 'Dezembro',
];

echo '  <div class="news-list-header">';
echo '      <h1>Notícias</h1>';
echo '  </div>';
echo '  <div class="news-list-header-colapse">';
echo '      <p>Noticias recentes: ';
echo '      <Button class="btn btn-sm btn-primary" onclick="document.querySelector(\'.news-list\').classList.toggle(\'show\');">Mostrar</Button> </p>';
echo '  </div>';
echo '  <hr />';
echo '  <div class="news-list">';
$i = 0;
$year_old = '';
for ($i = 0; $i < count($list); $i++) {
    $year = explode('/', $news[$i])[0];

    if ($year != $year_old) {
        echo '<div class="news-list-year">Notícias de ' . $year . '</div>';
    }

    $datetime = explode('.', explode('_', explode('/', $news[$i])[1])[1])[0];
    $strdatetime = explode('-', $datetime)[0] . ' de ' . $months[explode('-', $datetime)[1]];
    $headerContent = $list[$i]->getElementsByTagName('header')->item(0)->nodeValue;
    echo '<div class="news-list-item" onclick="window.location.href=\'?news=' . $news[$i] . '\'">';
    echo '  <p>' . $headerContent . '</p><div>' . $strdatetime . '</div>';
    echo '</div>';
    $year_old = $year;
}
echo '  </div>';

?>