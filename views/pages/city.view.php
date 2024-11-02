<?php
/**
 * @var WorldCityModel $city
 */
?>


<h1>City: <?= $city->getCityWithCountry()  ?></h1>

<a href="edit.php?<?php echo http_build_query(['id' => $city->id]) ?>">Edit</a>
<table>
    <tbody>
        <tr>
            <th>City name:</th>
            <td><?php echo e($city->city); ?></td>
        </tr>
        <tr>
            <th>City name (ascii):</th>
            <td><?php echo e($city->cityAscii); ?></td>
        </tr>
        <tr>
            <th>Country:</th>
            <td><?php echo e($city->country); ?></td>
        </tr>
        <tr>
            <th>Flag of the Country:</th>
            <td><?php echo e($city->getFlag()); ?></td>
        </tr>
        <tr>
            <th>ISO2 code of country:</th>
            <td><?php echo e($city->iso2); ?></td>
        </tr>
        <tr>
            <th>Population:</th>
            <td><?php echo e($city->population); ?></td>
        </tr>
    </tbody>
</table>