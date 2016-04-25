<?php

require_once __DIR__ . '/../abstract.php';

class Mage_Shell_Jira_Twin253 extends Mage_Shell_Abstract
{
    /**
     * Run script
     *
     */
    public function run()
    {
        $agreement = Mage::getModel('checkout/agreement');
        $agreement->setName('Terms and Conditions');
        $agreement->setIsActive('1');
        $agreement->setIsHtml('1');
        $agreement->setStore('0');
        $agreement->setCheckboxText('Ik heb mijn gegevens en bestelling gecontroleerd en bevestig dat deze correct zijn');
        $agreement->setContent('<div></div>');

        try {
            $agreement->save();
            echo "\nterms are created!";
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }

        // insert into mage_checkout_agreement_store values ($agreement->getId(), 0);
        try {
            $id = $agreement->getId();
            $sql = "insert into mage_checkout_agreement_store values ({$id}, 0)";
            $connection = Mage::getSingleton('core/resource')->getConnection('core_write');

            $connection->query($sql);
            echo "\n query done! \n";
        } catch (Exception $ex) {
            echo "\n" . $ex->getMessage() . "\n";
        }

        try {
            Mage::getModel('core/config')->saveConfig('checkout/options/enable_agreements', '1');
            Mage::getModel('core/config')->saveConfig('onestepcheckout/terms/enable_terms', '1');
            Mage::getModel('core/config')->saveConfig('onestepcheckout/terms/enable_default_terms', '1');
            echo "\nconfig is saved!\n";
        } catch (Exception $ex) {
            echo "\n" . $ex->getMessage() . "\n";
        }
    }
}

$shell = new Mage_Shell_Jira_Twin253;
$shell->run();