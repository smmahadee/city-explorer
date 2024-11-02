<?php

require __DIR__ . '/inc/all.inc.php';

$worldCityRepository = new WorldCityRepository($pdo);


// $budapest = new WorldCityModel();
// $budapest->city = 'Budapest';
// $budapest->population = 1294000;
// $budapest->country = 'Hungary';

// $dhaka = new WorldCityModel();
// $dhaka->city = 'Dhaka';
// $dhaka->population = 161000000;
// $dhaka->country = 'Bangladesh';

// $entries = [$dhaka, $budapest];
$entries = $worldCityRepository->fetch();


render('index.view', [
    'entries' => $entries
]);