<?php
/**
 * Created by PhpStorm.
 * User: Dmytro Portenko
 * Date: 7/16/16
 * Time: 7:45 PM
 */

require_once __DIR__ . '/abstract.php';

class Mage_Shell_Script extends Mage_Shell_Abstract {
    public function run()
    {
        try{

            $attr_code = 'custom_attibute';
            $name = 'Custom Attribute';
            $entity = 'catalog_product';

            $attr = Mage::getResourceModel('catalog/eav_attribute')->loadByCode($entity, $attr_code);
            echo "test\n";
            if ($attr->getId()) {
//                $attr->delete();
                echo "attribute {$attr_code} already exist \n";
                return;
            }
            $model=Mage::getModel('eav/entity_setup','core_setup');

            $data=array(
                'type'       => 'int',
                'input'      => 'select',
                'label'      => $name,
                'source'     => 'eav/entity_attribute_source_table',
                'sort_order' => 1000,
                'required'   => false,
                'global'     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                'backend'    => 'eav/entity_attribute_backend_array',
                'option'     => array (
                        'values' => array(
                            1 => 'option 1',
                            2 => 'option 2',
                            3 => 'my option 3',
                        )
                )
            );

            $model->addAttribute('catalog_product', $attr_code, $data);

            echo "\nattribute - ". $attr_code . " - has been added!\n";
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}

$shell = new Mage_Shell_Script();
$shell->run();