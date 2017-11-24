<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 13/11/2017
 * Time: 14:37
 */

class Stores_RetailDirectory_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction(){
        $this->loadLayout()->renderLayout();
    }

    public function viewAction(){

        $retailstore = Mage::getModel('stores_retaildirectory/retailstore');

        $name = $this->getRequest()->getParam('name', '');
        if (strlen($name) > 0){
            $retailstore->load($name, 'name');

        } else {
            $id = (int)$this->getRequest()->getParam('id', 0);
            $retailstore->load($id);
        }

        if ($retailstore->getId() < 1){
            $this->_redirect('*/*/index');
        }

        Mage::register('current_retailstore', $retailstore);
        $this->loadLayout()->renderLayout();
    }
}