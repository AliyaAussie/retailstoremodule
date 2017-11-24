<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:56
 */

class Stores_RetailDirectory_Model_Retailstore extends Mage_Core_Model_Abstract {

    const VISIBILITY_HIDDEN = '0';
    const VISIBILITY_DIRECTORY = '1';

    protected function _construct()
    {
        $this->_init('stores_retaildirectory/retailstore');
    }

    /**
     * The method is used in the grid and form for populating
     */
    public function getAvailableVisibilities(){
        return array(
          self::VISIBILITY_HIDDEN
            => Mage::helper('stores_retaildirectory')
             ->__('Hidden'),
            self::VISIBILITY_DIRECTORY
            => Mage::helper('stores_retaildirectory')
            ->__('Visible in Directory'),
        );
    }

    protected function _beforeSave()
    {
        parent::_beforeSave();

        $this->_updateTimestamps();
        $this->_prepareUrlKey();

        return $this;
    }
    protected function _updateTimestamps(){
        $timestamp = now();

        /**
         * Set the last updated timestamp.
         */
        $this->setUpdatedAt($timestamp);

        /**
         * If we have a brand new object, set the created timestamp.
         */
        if ($this->isObjectNew()){
            $this->setCreatedAt($timestamp);
        }
        return $this;
    }

    protected function _prepareUrlKey(){
        return $this;
    }

}