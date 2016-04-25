<?php

require_once __DIR__ . '/../abstract.php';

class Mage_Shell_Jira extends Mage_Shell_Abstract
{
    /**
     * Run script
     *
     */
    public function run()
    {
        try {
            $sql = "DELETE FROM `core_resource` WHERE `code` = 'postnl_setup' ";
            $connection = Mage::getSingleton('core/resource')->getConnection('core_write');

            $connection->query($sql);
            echo "\n done! \n";
        } catch (Exception $ex) {
            echo "\n" . $ex->getMessage() . "\n";
        }
    }

}

$shell = new Mage_Shell_Jira();
$shell->run();
