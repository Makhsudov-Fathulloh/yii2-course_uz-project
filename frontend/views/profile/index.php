<?php
echo "<pre>";
// print_r($model->orders);

foreach ($model as $m)
{
    echo $m->id . ' / ' . $m->first_name . "<br>"; 

    foreach ($m->orders as $order){
        echo $order->id . "/" . $order->ordered_at . "<>br";
     }
}

/*
echo $model->first_name . "<br>";

foreach ($model->orders as $item)
{
    echo $item->id . ' / ' . $item->ordered_at . "<br>";
}
*/