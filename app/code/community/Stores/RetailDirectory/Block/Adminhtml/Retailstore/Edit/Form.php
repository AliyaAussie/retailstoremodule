<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:53
 */

class Stores_RetailDirectory_Block_Adminhtml_Retailstore_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl(
                'stores_retaildirectory_admin/retailstore/edit',
                array(
                    '_current' => true,
                    'continue' => 0,
                )
            ),
            'method' => 'post',
        ));
        $form->setUseContainer(true);
        $this->setForm($form);

        // Define a new fieldset
        $fieldset = $form->addFieldset(
            'general',
            array(
                'legend' => $this->__('Retail Store Details')
            )
        );


        //Add fields to edit
        $this->_addFieldsToFieldset($fieldset, array(

                'name' => array(
                    'label' =>$this->__('Name'),
                    'input' => 'text',
                    'required' => true,
                ),
            'address_line_1' => array(
                'label' =>$this->__('Address Line 1'),
                'input' => 'text',
                'required' => true,
                'class' => 'validate-street',
            ),
            'address_line_2' => array(
                'label' =>$this->__('Address Line 2'),
                'input' => 'text',
                'required' => true,
            ),
            'postcode' => array(
                'label' =>$this->__('Postcode'),
                'input' => 'text',
                'required' => true,
            ),
            'latitude' => array(
                'label' =>$this->__('Latitude'),
                'input' => 'text',
                'required' => true,
            ),
            'longitude' => array(
                'label' =>$this->__('Longitude'),
                'input' => 'text',
                'required' => true,
            ),
            'daily_open' => array(
                'label' =>$this->__('Daily open'),
                'input' => 'text',
                'required' => true,
            ),
            'daily_closed' => array(
                'label' => $this->__('Daily closed'),
                'input' => 'text',
                'required' => true,
            ),
            'sat_open' => array(
                'label' => $this->__('Saturday open'),
                'input' => 'text',
                'required' => true
            ),
            'sat_closed' => array(
                'label' => $this->__('Saturday closed'),
                'input' => 'text',
                'required' => true
            ),
            'sun_open' => array(
                'label' => $this->__('Sunday open'),
                'input' => 'text',
                'required' => true
            ),
            'sun_closed' => array(
                'label' => $this->__('Sunday closed'),
                'input' => 'text',
                'required' => true
            ),
        ));
        return $this;

    }

    protected function _addFieldsToFieldset(
        Varien_Data_Form_Element_Fieldset $fieldset, $fields){
        $requestData = new Varien_Object($this->getRequest()->getPost('retailstoreData'));

        foreach ($fields as $name => $_data){
            if ($requestValue = $requestData->getData($name)){
                $_data['value'] = $requestValue;
            }

            // Wrap all fields with retailstoreData group.
            $_data['name'] = "retailstoreData[$name]";

            //Label and title are always the same
            $_data['title'] = $_data['label'];

            if(!array_key_exists('value', $_data)){
                $_data['value'] = $this->_getRetailStore()->getData($name);
            }

            $fieldset->addField($name, $_data['input'], $_data);
        }
        return $this;
    }

    protected function _getRetailStore(){
        if(!$this->hasData('retailstore')){
            $retailstore = Mage::registry('current_retailstore');

            if(!$retailstore instanceof Stores_RetailDirectory_Model_Retailstore){
                $retailstore = Mage::getModel('stores_retaildirectory/retailstore');
            }
            $this->setData('retailstore', $retailstore);
        }
        return $this->getData('retailstore');
    }
}