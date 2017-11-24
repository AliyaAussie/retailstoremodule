<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 13/11/2017
 * Time: 14:51
 */
$retailstore = Mage::getModel('stores_retaildirectory/retailstore');

for ($i = 1; $i <=5; $i++){
    $retailstore->setData(array(
        'name' => "Name {$i}",
        'entity_id' => "retailstore-entity_id-{$i}",
        'address_line_1' => "Address Line 1 {$i}",
        'address_line_2' => "Address Line 2 {$i}",
        'postcode' => "Postcode {$i}",
        'longitude' => "Longitude {$i}",
        'latitude' => "Latitude {$i}",
        'openning_hours' => "Opening Hours {$i}",

    ))
        ->save();
}

