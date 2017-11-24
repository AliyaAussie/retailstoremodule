<?php
class Stores_RetailDirectory_Model_Source_Retailstore
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{

    public function getAllOptions()
    {
        $storeCollection = Mage::getModel('stores_retaildirectory/retailstore')->getCollection()
            ->setOrder('name', 'ASC');

        $options = array(
            array(
                'label' => '',
                'value' => '',
            ),
        );

        foreach ($storeCollection as $store) {
            $options[] = array(
                'label' => $store->getName(),
                'value' => $store->getId(),
            );
        }

        return $options;
    }
}
