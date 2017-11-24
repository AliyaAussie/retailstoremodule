<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 12:00
 */
//
$this->startSetup();

$table = new Varien_Db_Ddl_Table();

$table->setName($this->getTable('stores_retaildirectory/retailstore'));

$table->addColumn(
    'entity_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    array(
        'auto_increment' => true,
        'unsigned' => true,
        'nullable'=> false,
        'primary' => true
    )
);
$table->addColumn(
    'name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'address_line_1',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    500,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'address_line_2',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    500,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'postcode',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    8,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'longitude',
    Varien_Db_Ddl_Table::TYPE_DOUBLE,
    30,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'latitude',
    Varien_Db_Ddl_Table::TYPE_DOUBLE,
    30,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'openning_hours',
    Varien_Db_Ddl_Table::TYPE_TEXT,
    500,
    array(
        'nullable' => false,
    )
);

$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');

$this->getConnection()->createTable($table);


$this->endSetup();



