<?php

//<h2 class='top-product'> Salom <?php echo $ism; ?->, men widget </h2>
 
/* 
foreach ($model as $item)
{
    echo $item->productName;
    echo "<br>";
}
*/

foreach ($model as $item)
{
    echo "<a href=/product?id=$item->productCode>".$item->productName."</a>";
    echo "<br>";
}

?>