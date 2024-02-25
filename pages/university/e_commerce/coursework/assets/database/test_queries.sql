-- SEARCH &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&			  
-- main search
SELECT ecom_product.name AS product_name, product_id, YEAR, ecom_product.man_id AS man_id, manufacturer, ecom_type.name AS type_name, price, image
FROM ecom_product, ecom_manufacturer, ecom_type
WHERE ecom_product.typ_id = ecom_type.type_id
AND ecom_product.man_id = ecom_manufacturer.manufacturer_id
AND (ecom_product.name LIKE '%%' OR ecom_manufacturer.manufacturer LIKE '%%');


-- TYPE &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
-- select all products that match the type selected (main type query)
SELECT ecom_product.name AS product_name, product_id, YEAR, ecom_product.man_id AS man_id, manufacturer, ecom_type.name AS type_name, price, image 
FROM ecom_type
LEFT JOIN ecom_product ON ecom_type.type_id = ecom_product.typ_id
LEFT JOIN ecom_manufacturer ON ecom_product.man_id = ecom_manufacturer.manufacturer_id
WHERE ecom_type.name = 'Snowboards';

-- select only the first image for each product returned from the above query
SELECT NAME, location FROM ecom_product, ecom_product_image
WHERE ecom_product.product_id = ecom_product_image.prod_id AND ecom_product.man_id = ecom_product_image.man_id AND ecom_product.product_id = 'Fuz_01' AND ecom_product.man_id = 3
LIMIT 1;


			  
-- MANUFACTURER &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
-- Show all manufacturers

-- Show all products from specific manufacturer
SELECT ecom_product.name AS product_name, product_id, YEAR, manufacturer_id, manufacturer, ecom_type.name AS type_name, size, price, image
FROM ecom_product, ecom_manufacturer, ecom_type
WHERE ecom_product.typ_id = ecom_type.type_id AND ecom_product.man_id = ecom_manufacturer.manufacturer_id AND (ecom_product.name LIKE 'burton' OR ecom_manufacturer.manufacturer LIKE 'burton');

-- PRODUCT &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
-- Show product details for one product
SELECT `product_id`, `ecom_product`.`name` AS `product_name`, `manufacturer`, `image` AS `manufacturer_image`, `size`, `price`, `year`, `ecom_product`.`description` AS `product_description`, `ecom_type`.`name` AS `type_name` FROM ecom_product
LEFT JOIN ecom_manufacturer ON ecom_product.man_id = ecom_manufacturer.manufacturer_id
LEFT JOIN ecom_type ON ecom_product.typ_id = ecom_type.type_id
WHERE ecom_product.product_id = 'fuz_01' AND ecom_product.man_id = 3;

-- Show all comments for one product
SELECT `name`, `comment`
FROM `ecom_post`, `ecom_product`
WHERE `ecom_post`.`prod_id` = `ecom_product`.`product_id`
AND `ecom_post`.`man_id` = `ecom_product`.`man_id`
AND `ecom_product`.`name` = "Ghost" ;

-- Show all image locations for one product
SELECT NAME, location FROM ecom_product, ecom_product_image
WHERE ecom_product.product_id = ecom_product_image.prod_id AND ecom_product.man_id = ecom_product_image.man_id AND ecom_product.product_id = 'Fuz_01' AND ecom_product.man_id = 3;

-- TEST STUFF &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

-- query using concat to concatenate two fields as one
SELECT concat(`man_id`, '-',`product_id`) AS total FROM `ecom_product`; 

-- create a test table for a concat experiment
CREATE TABLE `ecom_test` (
`unique` VARCHAR(10),
PRIMARY KEY(`unique`)
);

-- create a concat value created from two other database values and insert that into the test table
INSERT INTO `ecom_test` (`unique`)
SELECT concat(`man_id`, '-', `product_id`) AS test FROM ecom_product;