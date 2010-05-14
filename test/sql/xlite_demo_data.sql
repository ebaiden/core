-- Update config table
UPDATE xlite_config SET comment = 'Check this to temporary close the shop (not available in Demo store)' WHERE name = 'shop_closed';
UPDATE xlite_config SET value = 'Y' WHERE name = 'customer_security';
UPDATE xlite_config SET value = 'Y' WHERE name = 'enable_sale_price';
UPDATE xlite_config SET value = 'Y' WHERE name = 'you_save';
REPLACE INTO `xlite_config` VALUES ('memberships','Membership levels','a:0:{}','Memberships',0,'serialized');
REPLACE INTO `xlite_config` VALUES ('membershipsCollection','Membership levels','a:3:{i:1;a:3:{s:7:\"orderby\";s:2:\"10\";s:10:\"membership\";s:4:\"Gold\";s:13:\"membership_id\";i:1;}i:2;a:3:{s:7:\"orderby\";s:2:\"20\";s:10:\"membership\";s:8:\"Platinum\";s:13:\"membership_id\";i:2;}i:3;a:3:{s:7:\"orderby\";s:2:\"30\";s:10:\"membership\";s:10:\"Wholesaler\";s:13:\"membership_id\";i:3;}}','Memberships',0,'serialized');

-- UPS Online Tool demo data
UPDATE xlite_config SET value = 'ogqjninmqonpqsqhqnqjnnojoipipgokpe' WHERE name = 'UPS_accesskey';
UPDATE xlite_config SET value = 'fiefeherephderekegeken' WHERE name = 'UPS_password';
UPDATE xlite_config SET value = 'jpinhliriqhmikhmfififkgi' WHERE name = 'UPS_username';

-- Enable demo modules
UPDATE xlite_modules SET enabled = '1' WHERE name IN (
	'AdvancedSearch',
	'AuthorizeNet',
	'Bestsellers',
	'DetailedImages',
	'DrupalConnector',
	'FeaturedProducts',
	'GiftCertificates',
	'GoogleCheckout',
	'InventoryTracking',
	'JoomlaConnector',
	'MultiCategories',
	'PayPalPro',
	'ProductAdviser',
	'ProductOptions',
	'UPSOnlineTools',
	'USPS',
	'WishList',
	'WholesaleTrading'
);

-- Test gift certificate
INSERT INTO xlite_giftcerts VALUES ('TESTGIFT',1,'Mr. Guest Guest','123','E','demo@litecommerce.com','','','','','0','','','','','','50.00','50.00','A',1270203328,1332411328,0,'','','no_border',NULL);

-- Featured products
INSERT INTO xlite_featured_products VALUES (4006,0,10);
INSERT INTO xlite_featured_products VALUES (3002,0,20);
INSERT INTO xlite_featured_products VALUES (4059,0,30);
INSERT INTO xlite_featured_products VALUES (4043,0,40);
INSERT INTO xlite_featured_products VALUES (4020,0,50);




