INSERT INTO `xlite_orders` SET order_id = 1, profile_id = 1, orig_profile_id = 1, total = '20.7599', subtotal = '17.9900', is_order = 1, date = 1283939344, status = 'P', taxes = 'a:1:{s:3:\"Tax\";s:4:\"0.00\";}';
INSERT INTO xlite_payment_transactions VALUES (1,1,5,'MoneyOrdering','Money Ordering','S',20.7599,'sale','');
INSERT INTO `xlite_orders` SET order_id = 2, profile_id = 1, orig_profile_id = 3, total = '121.1137', subtotal= '116.9100',is_order = 1, date = 1283867845, status = 'C', taxes = 'a:1:{s:3:\"Tax\";s:4:\"0.00\";}';
INSERT INTO xlite_payment_transactions VALUES (2,2,5,'MoneyOrdering','Money Ordering','S',121.1137,'sale','');

INSERT INTO `xlite_order_items` VALUES (1,1,3002,'product','Binary Mom','00000','17.9900','-1.00',1,'17.9900','17.9900','0.00',0,NULL,'','','');
INSERT INTO `xlite_order_items` VALUES (2,2,4059,'product','Paint Shop Pro Web Graphics [PDF]','00057','39.9500','-1.00',1,'39.9500','39.9500','0.00',0,NULL,'','','');
INSERT INTO `xlite_order_items` VALUES (3,2,4003,'product','Planet Express Babydoll','00001','19.9900','-1.00',1,'19.9900','19.9900','0.00',0,NULL,'','','');
INSERT INTO `xlite_order_items` VALUES (4,2,4008,'product','Planet Express','00006','18.9900','-1.00',1,'18.9900','18.9900','0.00',0,NULL,'','','');
INSERT INTO `xlite_order_items` VALUES (5,2,4010,'product','Wi-Fi Detector Shirt','00008','19.9900','-1.00',1,'19.9900','19.9900','0.00',0,NULL,'','','');
INSERT INTO `xlite_order_items` VALUES (6,2,3002,'product','Binary Mom','00000','17.9900','-1.00',1,'17.9900','17.9900','0.00',0,NULL,'','','');


INSERT INTO `xlite_order_item_options` VALUES (1,1,4010,4045,'Color','Bimini',0);
INSERT INTO `xlite_order_item_options` VALUES (2,1,4011,4047,'Size','S',0);
INSERT INTO `xlite_order_item_options` VALUES (3,3,4000,4000,'Size','S',0);
INSERT INTO `xlite_order_item_options` VALUES (4,4,4005,4023,'Size','S',0);
INSERT INTO `xlite_order_item_options` VALUES (5,5,4006,4028,'Size','S',0);
INSERT INTO `xlite_order_item_options` VALUES (6,6,4010,4045,'Color','Bimini',0);
INSERT INTO `xlite_order_item_options` VALUES (7,6,4011,4047,'Size','S',0);


INSERT INTO `xlite_order_modifiers` VALUES (12,1,'tax','Tax',1,1,'Tax','0.0000');
INSERT INTO `xlite_order_modifiers` VALUES (11,1,'tax','shipping_tax',0,0,'shipping_tax','0.0000');
INSERT INTO `xlite_order_modifiers` VALUES (10,1,'shipping','Shipping cost',1,1,'shipping','2.7699');
INSERT INTO `xlite_order_modifiers` VALUES (36,2,'tax','Tax',1,1,'Tax','0.0000');
INSERT INTO `xlite_order_modifiers` VALUES (35,2,'tax','shipping_tax',0,0,'shipping_tax','0.0000');
INSERT INTO `xlite_order_modifiers` VALUES (34,2,'shipping','Shipping cost',1,1,'shipping','4.2037');


