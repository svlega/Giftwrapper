<?php
class Mym_Giftwrapper_Block_Sales_Order_Total extends Mage_Core_Block_Template
{
  

    /**
     * Get order object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return $this->getParentBlock()->getOrder();
    }

    /**
     * Get totals source object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

   
    /**
     * Initialize Giftwrapper total
     *
     * @return Mage_Block_Sales_Order_Total
     */
    public function initTotals()
    {
        if ((float) $this->getOrder()->getBaseGiftwrapperCharge()) {
            $source = $this->getSource();
            $value  = $source->getGiftwrapperCharge();

            $this->getParentBlock()->addTotal(new Varien_Object(array(
                'code'   => 'giftwrapper',
                'strong' => false,
                'label'  => Mage::helper('giftwrapper')->__('Gift wrapper'),
                'value'  => $source instanceof Mage_Sales_Model_Order_Creditmemo ? - $value : $value
            )));
        }

        return $this;
    }
}
