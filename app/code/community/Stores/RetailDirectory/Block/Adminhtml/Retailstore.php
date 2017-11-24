<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:53
 */

class Stores_RetailDirectory_Block_Adminhtml_Retailstore extends Mage_Adminhtml_Block_Widget_Grid_Container {
    protected function _construct()
    {
        parent::_construct();

        /**
         * The $_blockGroup property tells Magento which alias to use to
         * locate the blocks to be displayed in this grid container.
         *
         */
        $this->_blockGroup = 'stores_retaildirectory_adminhtml';

        /**
         * $_controller is a slightly confusing name for this property.
         * This value, in fact, refers to the folder containing our
         * Grid.php and Edit.php
         **/
        $this->_controller = 'retailstore';

        /**
         * The title of the page in the admin panel.
         */
        $this->_headerText = Mage::helper('stores_retaildirectory')
            ->__('Retail Store Directory');
    }

    public function getCreateUrl()
    {
        return $this->getUrl('stores_retaildirectory_admin/retailstore/edit');
    }
}