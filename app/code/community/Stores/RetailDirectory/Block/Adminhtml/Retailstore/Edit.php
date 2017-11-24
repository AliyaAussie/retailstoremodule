<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:53
 */
class Stores_RetailDirectory_Block_Adminhtml_Retailstore_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    protected function _construct()
    {

        $this->_blockGroup = 'stores_retaildirectory_adminhtml';
        $this->_controller = 'retailstore';

        /**
         * The $_mode tells Magento which folder to use
         * to locate the related form blocks to be displayed
         * in this form container
         */
        $this->_mode = 'edit';

        $newOrEdit = $this->getRequest()->getParam('id')
            ? $this->__('Edit')
            : $this->__('New');
        $this->_headerText = $newOrEdit . ' ' . $this->__('Retail Store');
    }
}