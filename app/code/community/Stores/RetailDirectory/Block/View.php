<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 14/11/2017
 * Time: 09:09
 */

class Stores_RetailDirectory_Block_View extends Mage_Core_Block_Template {

    public function getCurrentRetailStore(){
        return Mage::registry('current_retailstore');
    }

    public function getRetailStoreProductCollection(){
        $retailstore = $this->getCurrentRetailStore();
        if(!$retailstore) {
            return array();
        }
        return Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('retailstore_id')
            ->addFieldToFilter('retailstore_id', $retailstore->getId())
            ->setOrder('name', 'ASC');
   }
}