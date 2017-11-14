ALTER TABLE `ras_properties` ADD COLUMN `single_value` enum('Y','N') DEFAULT 'Y';
ALTER TABLE `ras_properties` ADD COLUMN `use_value_ext_html` enum('Y','N') DEFAULT 'N';

UPDATE `ras_products_properties` SET value_ext_html='<img src="images/steamlogo.png">' WHERE TRIM(value_str)="Steam";
UPDATE `ras_products_properties` SET value_ext_html='<img src="images/Origin.png">' WHERE TRIM(value_str)="Origin";
UPDATE `ras_products_properties` SET value_ext_html='<img src="images/uplay.png">' WHERE TRIM(value_str)="Uplay";
UPDATE `ras_products_properties` SET value_ext_html='<img src="images/battlenet.png">' WHERE TRIM(value_str)="Battle.net";



