<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property int $productCode
 * @property string $productName
 * @property string|null $size
 * @property string|null $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */
    public $product;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productCode', 'productName'], 'required'],
            [['productCode'], 'integer'],
            [['productName', 'size', 'category'], 'string', 'max' => 255],
            [['productCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'productCode' => Yii::t('app', 'Product Code'),
            'productName' => Yii::t('app', 'Product Name'),
            'size' => Yii::t('app', 'Size'),
            'category' => Yii::t('app', 'Category'),
        ];
    }
}
