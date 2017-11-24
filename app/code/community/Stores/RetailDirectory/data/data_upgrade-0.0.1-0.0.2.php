<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 14/11/2017
 * Time: 14:47
 */

//fetch all retail stores for associating to products
$retailstoreIds = Mage::getModel('stores_retaildirectory/retailstore')->getCollection()
    ->getAllIds();

//fetch the default product attribute set id
$eavEntityType = Mage::getModel('eav/entity_type')->load('catalog_product', 'entity_type_code');
$productApi = Mage::getModel('catalog/product_api');
$attributeSet = Mage::getModel('eav/entity_attribute_set')->getCollection()
    ->addFieldToFilter('attribute_set_name', 'Default')
    ->addFieldToFilter('entity_type_id', $eavEntityType->getId())
    ->getFirstItem();

//fetch all website ids
$websiteIds = array_keys(Mage::app()->getWebsites());

//create 5 products with random retail stores associated
for ($i=0; $i<=5; $i++ ){
    $productApi->create(
      Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
        $attributeSet->getId(),
        "retailstore-product-{$i}",
        array(
            'name' => "Retail Store Product {$i}",
            'url_key' => "retailstore-product-{$i}",
            'description' => "Retail Store Product {$i}",
            'short_description' => "Retail Store Product {$i}",
            'weight' => '1',
            'status' => '1',
            'visibility' => '4',
            'price' => '100',
            'stock_data' => array(
                'qty' => '199',
                'is_in_stock' => '1',
            ),
            'website_ids' => $websiteIds,
            'retailstore_id' => array_rand($retailstoreIds),
        )
    );
}