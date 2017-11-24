<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 13/11/2017
 * Time: 14:23
 */
class Stores_RetailDirectory_Block_List extends Mage_Core_Block_Template {
    public function getRetailStoreCollection()
    {
        return Mage::getModel('stores_retaildirectory/retailstore')->getCollection()
            ->setOrder('name', 'ASC');
    }
}