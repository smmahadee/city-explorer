<h1>List of cities:</h1>
<ul>
    <?php foreach ($entries as $city) : ?>
        <li>
        <a href="city.php?<?php echo http_build_query(['id'=> $city->id]) ?>"> <?php echo $city->city ?> (<?php echo $city->country ?>)</a>

        </li>
    <?php endforeach; ?>
</ul>