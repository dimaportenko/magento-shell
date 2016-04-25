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
class Update_CMS_Design_Shell extends Mage_Shell_Abstract
{
    /**
     * Run script
     *
     */
    public function run()
    {
        // cms/page
        $home_page = Mage::getModel('cms/page')->load('home.html', 'identifier');  
        $home_page->setContent('<div class="clear"></div>');

        try {
            $home_page->save();
            echo "\ncms/page : home page updated success!\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
            
        // cms/block
        $store_ids = array();
        foreach (Mage::app()->getWebsites() as $website) {
            foreach ($website->getGroups() as $group) {
                $stores = $group->getStores();
                foreach ($stores as $store) {    
                    $store_ids[] = $store->getId();
                }
            }
        }
        
        $block_identifier = 'block_row_1';
        $block = Mage::getModel('cms/block')->load($block_identifier, 'identifier');
        $block_content = '<div class="row">
    <div class="col-xs-12 col-sm-6">
        <ul class="list-1 row">
            <li class="col-xs-6">
                <a class="blok-style-1" href="{{store url=\'\'}}men-s.html">
                    <img src="{{skin url=\'images/media/img-1.png\'}}" alt="">
                </a>    
            </li>
            <li class="col-xs-6">
                <a class="blok-style-1" href="{{store url=\'\'}}shop-by-sport.html">
                    <img src="{{skin url=\'images/media/img-2.png\'}}" alt="">
                </a>    
            </li>
            <li class="col-xs-6">
                <a class="blok-style-1" href="{{store url=\'\'}}women-s.html">
                    <img src="{{skin url=\'images/media/img-3.png\'}}" alt="">
                </a>    
            </li>
            <li class="col-xs-6">
                <a class="blok-style-1" href="{{store url=\'\'}}men-s.html">
                    <img src="{{skin url=\'images/media/img-4.png\'}}" alt="">
                </a>    
            </li>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="blok-style-1">
            <img src="{{skin url=\'images/media/img-5.png\'}}" alt="">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <a class="blok-style-1" href="{{store url=\'\'}}shop-by-sport.html">
            <img src="{{skin url=\'images/media/img-6.png\'}}" alt="">
        </a>
    </div>
    <div class="col-sm-9">
        <a class="blok-style-1" href="{{store url=\'\'}}gear.html">
            <img src="{{skin url=\'images/media/img-7.png\'}}" alt="">
        </a>
    </div>
</div>

<div class="row bottom-banner">
    <div class="col-sm-12">
        <a class="blok-style-1" href="{{store url=\'\'}}shop-by-sport.html">
            <img src="{{skin url=\'images/media/img-8.png\'}}" alt="">
        </a>
    </div>
</div>';
        $block->setContent($block_content);
        $block->setIdentifier($block_identifier);
        $block->setTitle($block_identifier);
        $block->setStores($store_ids);
        try {
            $block->save();
            echo "\ncms/block : " . $block_identifier . " updated success!\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
        // cms/block
        $block_identifier = 'featured_products_static';
        $block = Mage::getModel('cms/block')->load($block_identifier, 'identifier');
        $block_content = '{{block type="featuredproducts/listing" template="featured/featuredproducts/list_home.phtml"}}';
        $block->setContent($block_content);
        $block->setIdentifier($block_identifier);
        $block->setTitle($block_identifier);
        $block->setStores($store_ids);
        try {
            $block->save();
            echo "\ncms/block : " . $block_identifier . " updated success!\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
        // cms/block
        $block_identifier = 'tm_footer_information';
        $block = Mage::getModel('cms/block')->load($block_identifier, 'identifier');
        $block_content = '<ul>
<li><a href="http://sightshapers.com/about-us.html">About Us</a></li>
<li><a href="http://sightshapers.com/delivery-information.html">Delivery Information</a></li>
<li><a href="http://sightshapers.com/privacy-policy-cookie-restriction-mode.html">Privacy Policy</a></li>
<li><a href="http://sightshapers.com/free-delivery.html">Free Delivery</a></li>
<li><a href="http://sightshapers.com/general-terms-and-conditions.html" target="_self">Term &amp; Condition</a></li>
</ul>';
        $block->setContent($block_content);
        $block->setIdentifier($block_identifier);
        $block->setTitle($block_identifier);
        $block->setStores($store_ids);
        try {
            $block->save();
            echo "\ncms/block : " . $block_identifier . " updated success!\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
        // cms/block
        $block_identifier = 'tm_footer_customer_service';
        $block = Mage::getModel('cms/block')->load($block_identifier, 'identifier');
        $block_content = '<ul>
<li><a href="http://sightshapers.com/customer-assistance.html">Customer Assistance</a></li>
<li><a href="http://sightshapers.com/delivery-information.html">Delivery Information</a></li>
<li><a href="http://sightshapers.com/product-information.html">Product Information</a></li>
<li><a href="http://sightshapers.com/international-shipping.html">International Shipping</a></li>
</ul>';
        $block->setContent($block_content);
        $block->setIdentifier($block_identifier);
        $block->setTitle($block_identifier);
        $block->setStores($store_ids);
        try {
            $block->save();
            echo "\ncms/block : " . $block_identifier . " updated success!\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
        // cms/block
        $block_identifier = 'tm_footer_contact_us';
        $block = Mage::getModel('cms/block')->load($block_identifier, 'identifier');
        $block_content = '<ul>
<li class="address">
<div class="inner_contact">Sightshapers, Zandstraat 121-A, 6658 CR, Beneden-Leeuwen, Netherlands</div>
</li>
<li class="address">
<div class="inner_contact">PO Box 64, 6658 ZH Beneden-Leeuwen, Netherlands</div>
</li>
<li class="phoneno">
<div class="inner_contact">Phone No:<br />+31-6248-64148</div>
</li>
<li class="email">
<div class="inner_contact"><a href="mailto:support@sightshapers.com">support@sightshapers.com</a></div>
</li>
</ul>';
        $block->setContent($block_content);
        $block->setIdentifier($block_identifier);
        $block->setTitle($block_identifier);
        $block->setStores($store_ids);
        try {
            $block->save();
            echo "\ncms/block : " . $block_identifier . " updated success!\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
        // --- cms/widget --- //        
        $widgetName = 'Home page images';
        $widgetHome = Mage::getModel('widget/widget_instance')->load($widgetName, 'title');
//        var_dump($widgetHome);
        $widgetHome->delete();

        $block_identifier = 'block_row_1';
        $block_id = Mage::getModel('cms/block')->load($block_identifier, 'identifier')->getId();
        $widgetParameters = array(
            'block_id' => $block_id,
        );

        $widgetHome->setData(array(
            'type' => 'cms/widget_block',
            'package_theme' => 'tm_themes/theme720', // has to match the concrete theme containing the template
            'title' => $widgetName,
            'store_ids' => '0', // or comma separated list of ids
            'widget_parameters' => serialize($widgetParameters),
            'sort_order' => '0',
            'page_groups' => array(array(
                'page_group' => 'pages',
                'pages' => array(
                    'page_id' => '1',
                    'group' => 'all_pages',
                    'layout_handle' => 'cms_index_index',
                    'block' => 'content',
                    'for' => 'all',
                    'template' => 'cms/widget/static_block/default.phtml',
                )
            ))
        ));
        try {
            $widgetHome->save();
            echo "\nwidget is saved\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
        // --- cms/widget --- //      
        $widgetName = 'Featured Products Widget';
        $widgetHome = Mage::getModel('widget/widget_instance')->load($widgetName, 'title');
//        var_dump($widgetHome);
        $widgetHome->delete();

        $block_identifier = 'featured_products_static';
        $block_id = Mage::getModel('cms/block')->load($block_identifier, 'identifier')->getId();
        $widgetParameters = array(
            'block_id' => $block_id,
        );

        $widgetHome->setData(array(
            'type' => 'cms/widget_block',
            'package_theme' => 'tm_themes/theme720', // has to match the concrete theme containing the template
            'title' => $widgetName,
            'store_ids' => '0', // or comma separated list of ids
            'widget_parameters' => serialize($widgetParameters),
            'sort_order' => '10',
            'page_groups' => array(array(
                'page_group' => 'pages',
                'pages' => array(
                    'page_id' => '1',
                    'group' => 'all_pages',
                    'layout_handle' => 'cms_index_index',
                    'block' => 'content',
                    'for' => 'all',
                    'template' => 'cms/widget/static_block/default.phtml',
                )
            ))
        ));
        try {
            $widgetHome->save();
            echo "\nwidget is saved\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

$shell = new Update_CMS_Design_Shell();
$shell->run();
