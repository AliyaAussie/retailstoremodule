<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:57
 */

class Stores_RetailDirectory_Adminhtml_Openinghourscontroller extends Mage_Adminhtml_Controller_Action{

    /**
     * Instantiate our grid container block and add to the page content.
     * When accessing this admin index page, we will see a grid of all
     * retail stores currently available in our Magento instance, along with
     * a button to add a new one if we wish.
     */
    public function indexAction(){
        //instantiate the grid container
        $openinghoursBlock = $this->getLayout()->createBlock('stores_retaildirectory_adminhtml/openinghours');

        //Add the grid container as the only item on this page
        $this->loadLayout()
            ->_addContent($openinghoursBlock)
            ->renderLayout();


    }

    /**
     * This action handles both viewing and editing existing retail stores
     */
    public function editAction()
    {
        /**
         * retrieving existing brand data if an ID was specified,
         * if not we will have an empty Brand entity ready to be populated.
         */
        $retailstore = Mage::getModel('stores_retaildirectory/retailstore');
        if ($retailstoreId = $this->getRequest()->getParam('id', false)) {
            $retailstore->load($retailstoreId);
            if ($retailstore->getId() < 1) {
                $this->_getSession()->addError(
                    $this->__('This retail store no longer exists.')
                );
                return $this->_redirect(
                    'stores_retaildirectory_admin/retailstore/index'
                );
            }
        }

        // process $_POST data if the form was submitted
        if ($postData = $this->getRequest()->getPost('retailstoreData')) {
            try {
                $retailstore->addData($postData);
                $retailstore->save();

                $this->_getSession()->addSuccess(
                    $this->__('The retail store has been saved.')
                );

                // redirect to remove $_POST data from the request
                return $this->_redirect(
                    'stores_retaildirectory_admin/retailstore/edit',
                    array('id' => $retailstore->getId())
                );
            } catch (Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
            }

            /**
             * if we get to here then something went wrong. Continue to
             * render the page as before, the difference being this time
             * the submitted $_POST data is available.
             */
        }

        // make the current brand object available to blocks
        Mage::register('current_retailstore', $retailstore);

        // instantiate the form container
        $retailstoreEditBlock = $this->getLayout()->createBlock(
            'stores_retaildirectory_adminhtml/retailstore_edit'
        );

        // add the form container as the only item on this page
        $this->loadLayout()
            ->_addContent($retailstoreEditBlock)
            ->renderLayout();
    }



    protected function _isAllowed(){
        $actionName = $this->getRequest()->getActionName();
        switch ($actionName) {
            case 'index':
            case 'edit':
            case 'delete':

            default:
                $adminSession = Mage::getSingleton('admin/session');
                $isAllowed = $adminSession
                    ->isAllowed('stores_retaildirectory/retailstore');
                break;
        }

        return $isAllowed;
    }
}