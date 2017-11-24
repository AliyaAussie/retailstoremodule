<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 13/11/2017
 * Time: 14:29
 */

class Stores_RetailDirectory_Helper_Retailstore extends Mage_Core_Helper_Abstract
{
    public function getRetailStoreUrl(Stores_RetailDirectory_Model_Retailstore $retailstore){
        if (!$retailstore instanceof  Stores_RetailDirectory_Model_Retailstore){
            return '#';
        }

        return $this->_getUrl(
           'stores_retaildirectory/index/view/',
            array(
                'name' => $retailstore->getName(),
            )

        );
    }
}