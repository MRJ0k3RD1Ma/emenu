<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property string|null $comment
 * @property float $narxi
 * @property float $narxi2
 * @property string $image
 * @property int $status
 * @property int $category_id
 * @property int $sort
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'narxi', 'image', 'category_id'], 'required'],
            [['narxi', 'narxi2'], 'number'],
            [['status', 'category_id', 'sort'], 'integer'],
            [['name', 'comment', 'image'], 'string', 'max' => 445],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'comment' => 'Izoh',
            'narxi' => 'Narxi',
            'narxi2' => 'Eski narxi',
            'image' => 'Rasm',
            'status' => 'Status',
            'category_id' => 'Kategoriyasi',
            'sort' => 'Sort',
        ];
    }
}
