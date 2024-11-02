<?php

require __DIR__ . '/inc/all.inc.php';

$page = (int) ($_GET['page'] ?? 1);
$page = max(1, $page);
$perPage = 20;

$worldCityRepository = new WorldCityRepository($pdo);
$entries = $worldCityRepository->paginate($page, $perPage);
$total = $worldCityRepository->count();


render('index.view', [
    'entries' => $entries,
    'pagination' => [
        'page' => $page,
        'perPage' => $perPage,
        'total' => $total,
    ]
]);