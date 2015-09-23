<?php

#Dmytro Portenko

require_once 'abstract.php';

/**
 * Magento Compiler Shell Script
 *
 * @category    Mage
 * @package     Mage_Shell
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Shell_RemoveGTMfromDB extends Mage_Shell_Abstract
{

    /**
     * Run script
     *
     */
    public function run()
    {
        $absolute_footer = Mage::getStoreConfig('design/footer/absolute_footer');
        
        $startSubstring = '<!-- Google Tag Manager -->';
        $endSubstring = '<!-- End Google Tag Manager -->';
        $startIndex = strpos($absolute_footer, $startSubstring);
        $endIndex = strpos($absolute_footer, $endSubstring);
        
        $absolute_footer = substr_replace($absolute_footer, '', $startIndex, $endIndex - $startIndex + strlen($endSubstring));
        
        $mageConfig = new Mage_Core_Model_Config();
        $mageConfig->saveConfig('design/footer/absolute_footer', $absolute_footer);
    }

}

$shell = new Mage_Shell_RemoveGTMfromDB();
$shell->run();
