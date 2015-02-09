<?php
class Mym_Giftwrapper_Model_Sales_Order_Total_Invoice_Giftwrapper extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
        /** To add the new total value to the invoice **/
	public function collect(Mage_Sales_Model_Order_Invoice $invoice)
	{
		$order = $invoice->getOrder();
		$giftwrapperChargeLeft = $order->getGiftwrapperCharge() - $order->getGiftwrapperChargeInvoiced();
		$baseGiftwrapperChargeLeft = $order->getBaseGiftwrapperCharge() - $order->getBaseGiftwrapperChargeInvoiced();
		$invoice->setGrandTotal($invoice->getGrandTotal() + $giftwrapperChargeLeft);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $baseGiftwrapperChargeLeft);		
		$invoice->setGiftwrapperCharge($giftwrapperChargeLeft);
		$invoice->setBaseGiftwrapperCharge($baseGiftwrapperChargeLeft);
		return $this;
	}
}
