<?php

$installer = $this;

$installer->startSetup();

$installer->run("
		
	ALTER IGNORE TABLE  `".$this->getTable('sales/order')."` ADD  `giftwrapper_charge` DECIMAL( 10, 2 ) NOT NULL;
	ALTER IGNORE TABLE  `".$this->getTable('sales/order')."` ADD  `base_giftwrapper_charge` DECIMAL( 10, 2 ) NOT NULL;
        ALTER IGNORE TABLE  `".$this->getTable('sales/quote_address')."` ADD  `giftwrapper_charge` DECIMAL( 10, 2 ) NOT NULL;
	ALTER IGNORE TABLE  `".$this->getTable('sales/quote_address')."` ADD  `base_giftwrapper_charge` DECIMAL( 10, 2 ) NOT NULL;
        ALTER IGNORE TABLE  `".$this->getTable('sales/invoice')."` ADD  `giftwrapper_charge` DECIMAL( 10, 2 ) NOT NULL;
	ALTER IGNORE TABLE  `".$this->getTable('sales/invoice')."` ADD  `base_giftwrapper_charge` DECIMAL( 10, 2 ) NOT NULL;

    ");

$installer->endSetup(); 