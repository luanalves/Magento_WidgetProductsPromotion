<?php

class Kasterweb_Promotion_Block_Promotion extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    const DEFAULT_COLUMN_COUNT = 5;
    const DEFAULT_PRODUCTS_COUNT = 5;
    const TITLE = 'NEW PRODUCTS';


    public function __construct()
    {
        parent::_construct();
    }

    protected function getColumnCount()
    {
        return self::DEFAULT_COLUMN_COUNT;
    }

    public function getProductsCount()
    {
        if (!$this->hasData('products_count')) {
            return self::DEFAULT_PRODUCTS_COUNT;
        }
        return $this->getData('products_count');
    }

    public function getTitle()
    {
        if (!$this->hasData('title')) {
            return self::TITLE;
        }
        return $this->getData('title');
    }

    /**
     * Product collection initialize process
     *
     * @return Mage_Catalog_Model_Resource_Product_Collection|Object|Varien_Data_Collection
     */
    protected function getProductCollection()
    {
        $searchCollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('status', 1)
            ->addAttributeToFilter('visibility', 4);
        $searchCollection->getSelect()->limit($this->getProductsCount());
        $searchCollection->getSelect()->where("'" . date('Y-m-d') . "' BETWEEN special_from_date AND special_to_date");
        $searchCollection->getSelect()->orWhere("'" . date('Y-m-d') . "' >= special_from_date");
//        echo $searchCollection->getSelect()->__toString();
        return $searchCollection->load();
    }
}