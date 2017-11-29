<?php
/**
 * Created by PhpStorm.
 * User: aliyatulyakova
 * Date: 09/11/2017
 * Time: 11:53
 */

class Stores_RetailDirectory_Block_Adminhtml_Openinghours_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    protected function _prepareCollection()
    {
        $date_cur = new DateTime();
        $date_cur = strtotime($date_cur->format('H:i:s'));
        $time = date("h:i");
        $day = date("l");

        echo '<h1 style="color: #00aa00">OPEN</h1>';
        /**
         * Tell Magento which collection to use to display in the grid.
         */
        $collection = Mage::getResourceModel('stores_retaildirectory/retailstore_collection');

            foreach ($collection as $_retailstore):
                $date_open = strtotime($_retailstore->getDaily_open());
                $date_close = strtotime($_retailstore->getDaily_closed());

                if($day != 'Saturday' && $day != 'Sunday' ) {

                    if ($date_cur >= $date_open && $date_cur <= $date_close) {

                        echo $_retailstore->getName() . ' ' . '</br>';

                    }
                } else {
                    if ($day == 'Saturday'){
                        $date_open = strtotime($_retailstore->getSat_open());
                        $date_close = strtotime($_retailstore->getSat_closed());
                        if($date_cur >= $date_open && $date_cur <= $date_close){
                            echo $_retailstore->getName() . ' ' . '</br>';
                        }
                    } else {
                        $date_open = strtotime($_retailstore->getSun_open());
                        $date_close = strtotime($_retailstore->getSun_closed());
                        if($date_cur >= $date_open && $date_cur <= $date_close){
                            echo $_retailstore->getName() . ' ' . '</br>';
                        }

                    }

                }

            endforeach;

        $this->closedRetailstores();
        return parent::_prepareCollection();
    }

    public function closedRetailstores(){
        echo '</br>';

        echo '<h1 style="color: #EE0000">CLOSED</h1>';

        $date_cur = new DateTime();
        $date_cur = strtotime($date_cur->format('H:i:s'));
        $time = date("h:i");
        $day = date("l");

        $collection = Mage::getResourceModel('stores_retaildirectory/retailstore_collection');

        foreach ($collection as $_retailstore):
            $date_open = strtotime($_retailstore->getDaily_open());
            $date_close = strtotime($_retailstore->getDaily_closed());
            $diff = $date_open - $date_cur;
            $time = date('H:i', $diff);

            if($day != 'Saturday' && $day != 'Sunday'){
                if ($date_cur < $date_open || $date_cur > $date_close){
                    echo $_retailstore->getName().' will be open in '.$time.' hour(s)</br>';
                }
            } else {
                if ($day == 'Saturday'){
                    $date_open = strtotime($_retailstore->getSat_open());
                    $date_close = strtotime($_retailstore->getSat_closed());
                    $diff = $date_open - $date_cur;
                    $time = date('H:i', $diff);
                    if ($date_cur < $date_open || $date_cur > $date_close){
                        echo $_retailstore->getName().' will be open in '.$time.' hour(s)</br>';
                    }
                } else {
                    $date_open = strtotime($_retailstore->getSun_open());
                    $date_close = strtotime($_retailstore->getSun_closed());
                    $diff = $date_open - $date_cur;
                    $time = date('H:i', $diff);
                    if ($date_cur < $date_open || $date_cur > $date_close){
                        echo $_retailstore->getName().' will be open in '.$time.' hour(s)</br>';
                    }
                }
            } endforeach;

    }

}