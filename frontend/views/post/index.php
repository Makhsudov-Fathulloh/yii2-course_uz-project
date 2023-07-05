<?php

if ($model->hasErrors()){
    echo "<pre>";
    print_r($model->getErrors());
    echo "</pre>";
}

echo "<pre>";
    print_r($model->attributes);
    echo "</pre>";

?>

<form method="post">
<label for="malumot_1">Malumot_1</label>
<input type="text" name="malumot_1" id="malumot_1"><br>
<label for="malumot_2">Malumot_2</label>
<input type="text" name="malumot_2" id="malumot_2"><br>

    <button type="submit">Yuborish</button>

</form>  