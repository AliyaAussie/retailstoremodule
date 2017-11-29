<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:56
 */
class Stores_RetailDirectory_Model_Resource_Retailstore extends Mage_Core_Model_Resource_Db_Abstract {
    protected function _construct()
    {
        /**
         * Tell Magento the database name and primary key field to persist
         * data to. Similar to the _construct() of our model, Magento finds
         * this data from config.xml by finding the <resourceModel/> node
         * and locating children of <entities/>.
         */
        $this->_init('stores_retaildirectory/retailstore', 'entity_id');


    }
}