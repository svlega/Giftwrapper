<?php
class Mym_Giftwrapper_Model_Sales_Quote_Address_Total_Giftwrapper extends Mage_Sales_Model_Quote_Address_Total_Abstract{
	protected $_code = 'giftwrapper';

	public function collect(Mage_Sales_Model_Quote_Address $address)
	{
		parent::collect($address);

		$this->_setAmount(0);
		$this->_setBaseAmount(0);

		$items = $this->_getAddressItems($address);
		if (!count($items)) {
			return $this; 
		}
		
		if($address->getBaseGiftwrapperCharge() > 0)
		{
		$address->setGrandTotal($address->getGrandTotal() + $address->getGiftwrapperCharge());
		$address->setBaseGrandTotal($address->getBaseGrandTotal() + $address->getBaseGiftwrapperCharge());
		}

	}

	public function fetch(Mage_Sales_Model_Quote_Address $address)
	{
		$amt = $address->getGiftwrapperCharge();
		if($amt > 0){		
		$address->addTotal(array(
				'code'=>$this->getCode(),
				'title'=>Mage::helper('giftwrapper')->__('Gift Wrapper'),
				'value'=> $amt
		));
		}
		return $this;
	}
}