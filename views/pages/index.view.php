<h1>List of cities:</h1>
<ul>
    <?php foreach ($entries as $city) : ?>
        <li>
            <a href="city.php?<?php echo http_build_query(['id' => $city->id]) ?>"> <?php echo $city->getCityWithCountry() ?></a>

        </li>
    <?php endforeach; ?>
</ul>

<h3>Page <?= $pagination['page'] ?> of <?= ceil($pagination['total'] / $pagination['perPage']) ?></h3>
<?php if($pagination['page'] > 1) : ?>
    <a href="index.php?<?php echo http_build_query(['page' => $pagination['page'] - 1]) ?>">Prev</a>
<?php endif; ?>
<?php if($pagination['page'] < ceil($pagination['total'] / $pagination['perPage'])) : ?>
<a href="index.php?<?php echo http_build_query(['page' => $pagination['page'] + 1]) ?>">Next</a>
<?php endif; ?>