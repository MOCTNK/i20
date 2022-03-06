/*Запрос получения списка разделов с количеством товаров по разделу*/
SELECT category.id, category.name, COUNT(category.name) AS count FROM category
JOIN product_category ON product_category.id_category = category.id
JOIN product ON product.id = product_category.id_category
jOIN warehouse ON warehouse.id_product = product.id
WHERE warehouse.count > 0
GROUP BY category.id, category.name
UNION
SELECT category.id, category.name, COUNT(category.name) AS count FROM category
JOIN product ON product.id_category = category.id
jOIN warehouse ON warehouse.id_product = product.id
WHERE warehouse.count > 0
GROUP BY category.id, category.name
ORDER BY count DESC;

/*Запрос получения списка товаров на одну страницу*/
SELECT product.id, product.name, image.name AS image, product.price, 
(product.price - (product.price * (100 - product.sale)) / 100) AS price_sale 
FROM product
JOIN image ON image.id = product.id_image
jOIN warehouse ON warehouse.id_product = product.id
WHERE warehouse.count > 0
LIMIT 12 OFFSET 0;

SELECT DISTINCT product.id, product.name, image.name AS image, product.price, 
(product.price - (product.price * (100 - product.sale)) / 100) AS price_sale 
FROM product
JOIN image ON image.id = product.id_image
JOIN product_category ON product_category.id_product = product.id
JOIN category ON category.id = product_category.id_category OR category.id = product.id_category
JOIN warehouse ON warehouse.id_product = product.id
WHERE warehouse.count > 0 AND category.id = 5
LIMIT 12 OFFSET 0;

/*Запрос получения списка товаров на одну страницу*/
SELECT product.id, product.name, image.name AS image, category.name AS category, 
(product.price - (product.price * (100 - product.sale)) / 100) AS price_sale,
product.price_promocode, product.info FROM product
JOIN image ON image.id = product.id_image
JOIN category ON category.id = product.id_category
jOIN warehouse ON warehouse.id_product = product.id
WHERE warehouse.count > 0 AND product.id = 1;

/*Запрос на получения дополнительный картинок товара*/
SELECT image.name FROM product_image
JOIN image ON image.id = product_image.id_image
JOIN product ON product.id = product_image.id_product
WHERE product.id = 1;

/*Запрос на получения дополнительный категорий товара*/
SELECT category.name FROM product_category
JOIN category ON category.id = product_category.id_category
JOIN product ON product.id = product_category.id_product
WHERE product.id = 1;