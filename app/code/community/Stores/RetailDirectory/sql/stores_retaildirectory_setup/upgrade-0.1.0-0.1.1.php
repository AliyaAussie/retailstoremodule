<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 16/11/2017
 * Time: 16:29
 */
//add a new product attribute to associate a retail store to each product
$this->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'retailstore_id', array(
    'group' => 'General',
    'label' => 'Retail Store',
    'input' => 'select',
    'source' => 'stores_retaildirectory/source_retailstore',
));