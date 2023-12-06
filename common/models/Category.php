<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int $navigate_id
 * @property int $status
 * @property string $image
 * @property int $sort
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'navigate_id', 'image'], 'required'],
            [['navigate_id', 'status', 'sort'], 'integer'],
            [['name', 'image'], 'string', 'max' => 445],
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
            'navigate_id' => 'Navigatsiya',
            'status' => 'Status',
            'image' => 'Rasm',
            'sort' => 'Sort',
        ];
    }
}
