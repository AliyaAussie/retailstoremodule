<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 14/11/2017
 * Time: 11:14
 */

class Stores_RetailDirectory_Block_Catalog_Product_View_Link extends Mage_Core_Block_Template
{
    public function getRetailStore(){
        $product = Mage::registry('current_product');
        if(!$product instanceof  Mage_Catalog_Model_Product){
            return false;
        }

        $retailstoreId = (int)$product->getRetailstoreId();
        $retailstore = Mage::getModel('stores_retaildirectory/retailstore')->load($retailstoreId);
        if ($retailstore->getId() < 1){
            return false;
        }
        return $retailstore;
    }
}