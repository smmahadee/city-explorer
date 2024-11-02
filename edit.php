<?php

require __DIR__ . '/inc/all.inc.php';

$id = (int) ($_GET['id'] ?? 0);

// GET CITY BY ID
$worldCityRepository = new WorldCityRepository($pdo);
$model = $worldCityRepository->fetchCityById($id);

if (!$model) {
    header('Location: index.php');
    die();
}

// UPDATE CITY BY ID
if (!empty($_POST)) {
    $city = (string) ($_POST['city'] ?? '');
    $cityAscii = (string) ($_POST['cityAscii'] ?? '');
    $country = (string) ($_POST['country'] ?? '');
    $iso2 = (string) ($_POST['iso2'] ?? '');
    $population = (int)  ($_POST['population'] ?? 0);

    if (!$city ||!$cityAscii ||!$country ||!$iso2 ||!$population) {
        header('Location: edit.php?id='. $id);
        die();
    }

    $model = $worldCityRepository->updateCityById($id, [
        'city' => $city,
        'cityAscii' => $cityAscii,
        'country' => $country,
        'iso2' => $iso2,
        'population' => $population
    ]);
   
}


render('edit.view', [
    'city' => $model,
]);
