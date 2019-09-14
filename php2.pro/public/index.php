
<?php
include "../engine/Autoload.php";

use app\engine\Autoload;
use app\model\products\DigitalProduct;
use app\model\products\PieceProduct;
use app\model\products\WeightProduct;

spl_autoload_register([new Autoload, 'load']);


$piece_product_1 = new PieceProduct(1,'Electronic Book', ['type'=>'Book'], 40, 'EA');
echo "Создан штучный товар, стоимостью $piece_product_1->price";
echo '<br>';

$piece_product_2 = new PieceProduct(2,'Electronic Book', ['type'=>'Book'], 50, 'EA');
echo "Создан штучный товар, стоимостью $piece_product_2->price";
echo '<br>';

echo "Сумма всех ШТУЧНЫХ товаров на даный момент составляет: ";
echo($piece_product_1->getSumPieceProducts());
echo '<br>';
echo "Сумма всех товаров на даный момент составляет: ";
echo($piece_product_1->getSummPrice());
echo '<br>';
echo '<br>';


$digital_product_1 = new DigitalProduct(2,'Book', ['type'=>'El_Book'], 40, 'EA');
echo "Создан цифровой товар, стоимостью $digital_product_1->price";
echo '<br>';

$digital_product_2 = new DigitalProduct(2,'Book', ['type'=>'El_Book'], 100, 'EA');
echo "Создан цифровой товар, стоимостью $digital_product_2->price";
echo '<br>';

echo "Сумма всех ЦИФРОВЫХ товаров на даный момент составляет: ";
echo($digital_product_1->getSumDigitalProducts());
echo '<br>';
echo "Сумма всех товаров на даный момент составляет: ";
echo($digital_product_2->getSummPrice());
echo '<br>';
echo '<br>';


$weight_product_1 = new WeightProduct(3,'Many Books', ['type'=>'KG_Book'], 10, 'EA', 5);
echo "Создан весовой товар, стоимостью $weight_product_1->price, и весом $weight_product_1->weight";
echo '<br>';

$weight_product_2 = new WeightProduct(3,'Many Books', ['type'=>'KG_Book'], 30, 'EA', 1);
echo "Создан весовой товар, стоимостью $weight_product_2->price, и весом $weight_product_2->weight";
echo '<br>';

echo "Сумма всех ВЕСОВЫХ товаров на даный момент составляет: ";
echo($weight_product_1->getSumWeightProducts());
echo '<br>';
echo "Сумма всех товаров на даный момент составляет: ";
echo($weight_product_1->getSummPrice());
echo '<br>';
echo '<br>';




