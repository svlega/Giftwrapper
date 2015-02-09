<?php
/**
 * Giftwrapper controller
 */
class Mym_Giftwrapper_IndexController extends Mage_Core_Controller_Front_Action
{
	
    /**
     * Post Giftwrapper action
     *
     * @return null
     */
    public function PostAction()
    {
    	$giftwrap = (string) $this->getRequest()->getParam('giftwrap_charge');
        $quote = Mage::getSingleton('checkout/cart')->getQuote();
		$address = $quote->getShippingAddress();

        try {
		
            if ($giftwrap == '1') {	//If gift wrapper is selected									   
			// To get the giftwrapper price from configuration
			$storeId = Mage::app()->getStore()->getId();                
			$giftwrapper_charge = Mage::getStoreConfig('checkout/giftwrapper/gift_wrapper_charge', $storeId);	
			$success_msg = $this->__('Gift wrapper is applied for your order' );
			}
			else{  //If gift wrapper is NOT selected
			$giftwrapper_charge = 0;
			$success_msg = $this->__('Gift wrapper is removed from your order' );
			}
			//Adding giftwrapper charge to the total
			$address->setGiftwrapperCharge($giftwrapper_charge);
			$address->setBaseGiftwrapperCharge($giftwrapper_charge);				
			$quote->setGiftwrapperCharge($giftwrapper_charge)
				  ->collectTotals()
				  ->save();				
			Mage::getSingleton('checkout/session')->addSuccess($success_msg);			            
            
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('checkout/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::getSingleton('checkout/session')->addError($this->__('Cannot apply the gift wrapper.'));
            Mage::logException($e);
        }

		$this->_redirect('checkout/cart');
    }
}