<?php

# Created by Dmytro Portenko

require_once 'abstract.php';

/**
 * Magento Log Shell Script
 *
 * @category    Mage
 * @package     Mage_Shell
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Setup_Tm_Themes_Theme720_Shell extends Mage_Shell_Abstract
{
    /**
     * Run script
     *
     */
    public function run()
    {
        $design = Mage::getModel('core/design');
        $design->setData('store_id','3');
        $design->setData('design','tm_themes/theme720');
//        $design->setData('date_from','YYYY-MM_DD');
//        $design->setData('date_to','YYYY-MM_DD');        

        try {
            $design->save();
            echo  "The design change has been saved.\n";
        } catch (Exception $e){
            $e->getMessage();
        }
        
        $design = Mage::getModel('core/design');
        $design->setData('store_id','2');
        $design->setData('design','tm_themes/theme720');

        try {
            $design->save();
            echo  "The design change has been saved.\n";
        } catch (Exception $e){
            $e->getMessage();
        }
        
        $design = Mage::getModel('core/design');
        $design->setData('store_id','1');
        $design->setData('design','tm_themes/theme720');

        try {
            $design->save();
            echo  "The design change has been saved.\n";
        } catch (Exception $e){
            $e->getMessage();
        }
    }
}

$shell = new Setup_Tm_Themes_Theme720_Shell();
$shell->run();
