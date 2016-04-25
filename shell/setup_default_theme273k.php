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
class Setup_Theme273k_Shell extends Mage_Shell_Abstract
{
    /**
     * Run script
     *
     */
    public function run()
    {
        $template_name = 'theme273k';
        $package_name = 'default';
        foreach (Mage::app()->getWebsites() as $website) {
            foreach ($website->getGroups() as $group) {
                $stores = $group->getStores();
                foreach ($stores as $store) {
//                    $design = Mage::getModel('core/design');
//                    $design->setData('store_id', $store->getId());
//                    $design->setData('design','default/theme273k');
//
//                    try {
//                        $design->save();
//                        echo  "The design change has been saved.\n";
//                    } catch (Exception $e){
//                        echo $e->getMessage() . "\n";
//                    }
                    
                    
                    $saveConfig = Mage::getModel('core/config');
                    $saveConfig->deleteConfig('design/package/name', 'default', $store->getId());
                    $saveConfig->deleteConfig('design/theme/template', 'default', $store->getId());
                    $saveConfig->deleteConfig('design/theme/layout', 'default', $store->getId());
                    $saveConfig->deleteConfig('design/theme/default', 'default', $store->getId());
//                    $saveConfig->saveConfig('design/theme/template', $template_name, 'stores', $store->getId());
//                    $saveConfig->saveConfig('design/theme/layout', $template_name, 'stores', $store->getId());
//                    $saveConfig->saveConfig('design/theme/default', $template_name, 'stores', $store->getId());
//                    $saveConfig->saveConfig('design/package/name', $package_name, 'stores', $store->getId());
                    
//                    try {
//                        $saveConfig->save();
//                        echo  "The design change has been saved.\n";
//                    } catch (Exception $e){
//                        echo $e->getMessage() . "\n";
//                    }
                }
            }
        }
    }
}

$shell = new Setup_Theme273k_Shell();
$shell->run();
