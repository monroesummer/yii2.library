<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library".
 *
 * @property string $id
 * @property string $name
 * @property string $author
 * @property string $publish
 * @property integer $year
 * @property integer $pages
 * @property integer $Illustrations
 * @property double $price
 * @property string $branch
 */
class Library extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'author', 'publish', 'year', 'pages', 'Illustrations', 'price', 'branch', 'department'], 'required'],
            [['year', 'pages', 'Illustrations'], 'integer'],
            [['price'], 'number'],
            [['name', 'author', 'publish', 'branch', 'department'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'author' => 'Автор',
            'publish' => 'Издательство',
            'year' => 'Год',
            'pages' => 'Страницы',
            'Illustrations' => 'Иллюстрации',
            'price' => 'Цена',
            'branch' => 'Филиал',
            'department' => 'Факультет',
        ];
    }
}
