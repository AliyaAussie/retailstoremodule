<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:53
 */

class Stores_RetailDirectory_Block_Adminhtml_Retailstore_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    protected function _prepareCollection()
    {
        /**
         * Tell Magento which collection to use to display in the grid.
         */
        $collection = Mage::getResourceModel('stores_retaildirectory/retailstore_collection');

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    public function getRowUrl($row){
        /**
         * When a grid row is clicked, this is where the user should
         * be redirected
         */
        return $this->getUrl('stores_retaildirectory_admin/retailstore/edit', array('id' => $row->getId()));
    }

    protected function _prepareColumns()
    {
        /**
         * Here, we'll define which columns to display in the grid.
         */
        $this->addColumn('entity_id', array(
            'header' => $this->_getHepler()->__('ID'),
            'type' => 'number',
            'index' => 'entity_id',
        ));

        $this->addColumn('name', array(
            'header' => $this->_getHepler()->__('Name'),
            'type' => 'text',
            'index' => 'name',
        ));

        $this->addColumn('address_line_1', array(
            'header' => $this->_getHepler()->__('Address Line 1'),
            'type' => 'text',
            'index' => 'address_line_1',
        ));

        $this->addColumn('address_line_2', array(
            'header' => $this->_getHepler()->__('Address Line 2'),
            'type' => 'text',
            'index' => 'address_line_2',
        ));

        $this->addColumn('postcode', array(
            'header' => $this->_getHepler()->__('Postcode'),
            'type' => 'text',
            'index' => 'postcode',
        ));

        $this->addColumn('latitude', array(
            'header' => $this->_getHepler()->__('Latitude'),
            'type' => 'number',
            'index' => 'latitude',
        ));

        $this->addColumn('longitude', array(
            'header' => $this->_getHepler()->__('Longitude'),
            'type' => 'number',
            'index' => 'longitude',
        ));

        $this->addColumn('daily_open', array(
            'header' => $this->_getHepler()->__('Daily open'),
            'type' => 'time',
            'index' => 'daily_open',
        ));

        $this->addColumn('daily_closed', array(
            'header' => $this->_getHepler()->__('Daily closed'),
            'type' => 'time',
            'index' => 'daily_closed',
        ));
        $this->addColumn('sat_open', array(
            'header' => $this->_getHepler()->__('Saturday open'),
            'type' => 'time',
            'index' => 'sat_open',
        ));
        $this->addColumn('sat_closed', array(
            'header' => $this->_getHepler()->__('Saturday closed'),
            'type' => 'time',
            'index' => 'sat_closed',
        ));
        $this->addColumn('sun_open', array(
            'header' => $this->_getHepler()->__('Sunday open'),
            'type' => 'time',
            'index' => 'sun_open',
        ));
        $this->addColumn('sun_closed', array(
            'header' => $this->_getHepler()->__('Sunday closed'),
            'type' => 'time',
            'index' => 'sun_closed',
        ));



        /**
         * Add an action column with an edit link
         */
        $this->addColumn('action', array(
            'header' => $this->_getHepler()->__('Action'),
            'width' => '50px',
            'type' => 'action',
            'actions' => array(
                array(
                    'caption' => $this->_getHepler()->__('Edit'),
                    'url' => array(
                        'base' => 'stores_retaildirectory_admin'.'/retailstore/edit',
                    ),
                    'field' => 'id'
                ),
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'entity_id',
        ));

        return parent::_prepareColumns();

    }

    protected function _getHepler(){
        return Mage::helper('stores_retaildirectory');
    }
}