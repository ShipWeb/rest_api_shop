INSERT INTO `ras_products` (`product_id`, `product_api_id`, `product_title`, `chpu`, `content`, `content_activation`, `seo_title`, `seo_description`, `seo_keywords`, `product_price`, `product_discount`, `product_thumbnail_path`, `product_thumbnail_name`, `date_create`, `date_create_gmt`, `date_modified`, `date_modified_gmt`, `in_stock`) VALUES
(81, NULL, 'Испытай удачу Silver', 'try-luck-silver', '', '', '', '', '', '59.00', '30.00', '', '', '2017-12-11 19:14:53', '2017-12-11 19:14:53', '2017-12-11 19:14:53', '2017-12-11 19:14:53', 1),
(82, NULL, 'Испытай удачу Gold', 'try-luck-gold', '', '', '', '', '', '99.00', '30.00', '', '', '2017-12-11 19:15:53', '2017-12-11 19:15:53', '2017-12-11 19:15:53', '2017-12-11 19:15:53', 1),
(83, NULL, 'Испытай удачу Diamond', 'try-luck-diamond', '', '', '', '', '', '149.00', '30.00', '', '', '2017-12-11 19:16:45', '2017-12-11 19:16:45', '2017-12-11 19:16:45', '2017-12-11 19:16:45', 1);

INSERT INTO `ras_settings` (`setting_id`, `setting_title`, `setting_name`, `setting_value`, `active`) VALUES
(4, 'Испытай удачу', 'MainLuck', '81,82,83', 'Y');