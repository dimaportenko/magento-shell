<?php

# Created by Dmytro Portenko

require_once 'abstract.php';

/**
 * Magento Compiler Shell Script
 *
 * @category    Mage
 * @package     Mage_Shell
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Shell_UpdateStaticBlockDataById extends Mage_Shell_Abstract
{

    /**
     * Run script
     *
     */
    public function run()
    {
        $id = 1;
        $block_by_id = Mage::getModel('cms/block')->load($id);//->delete();
        $data = $block_by_id->getData();
        $data["content"] = '<ul>
<li><span style="font-size: medium; font-family: tahoma, arial, helvetica, sans-serif;"><a href="{{store direct_url="over-ons"}}">Over Ons</a></span></li>
<li><span style="font-size: medium; font-family: tahoma, arial, helvetica, sans-serif;"><a href="{{store direct_url="algemene-voorwaarden"}}">Algemene Voorwaarden</a></span></li>
<li><span style="font-size: medium; font-family: tahoma, arial, helvetica, sans-serif;"><a href="{{store direct_url="privacy"}}">Privacy Policy</a></span></li>
<li><span style="font-size: medium; font-family: tahoma, arial, helvetica, sans-serif;"><a href="{{store direct_url="verzenden-retourneren"}}">Verzenden &amp; Retourneren</a></span></li>
<li class="last privacy"><span style="font-size: medium; font-family: tahoma, arial, helvetica, sans-serif;"><a href="{{store direct_url="klantenservice"}}">Klantenservice</a></span></li>
</ul>';
        $block_by_id->setData($data);
        
        $block_by_id->save();
    }

}

$shell = new Mage_Shell_UpdateStaticBlockDataById();
$shell->run();
