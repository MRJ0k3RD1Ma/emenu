<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "navigate".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $sort
 */
class Navigate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 445],
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
            'status' => 'Status',
            'sort' => 'Sort',
        ];
    }
}
