<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $setting_id
 * @property string|null $org_name
 * @property string|null $address
 * @property string|null $telefon_main
 * @property string|null $telefon_mob
 * @property string|null $telefon_home
 * @property string|null $hr
 * @property string|null $mfo
 * @property string|null $bank
 * @property string|null $city
 * @property string|null $inn
 * @property string|null $okonh
 * @property string|null $direktor
 * @property float $summaoy
 * @property float $summakun
 * @property float $vat_rate
 * @property float $vat_value
 * @property float $unit_price
 * @property float $subtotal
 * @property string|null $send_date
 * @property float $summaoy2
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['setting_id'], 'required'],
            [['setting_id'], 'integer'],
            [['summaoy', 'summakun', 'vat_rate', 'vat_value', 'unit_price', 'subtotal', 'summaoy2'], 'number'],
            [['send_date'], 'safe'],
            [['org_name', 'direktor'], 'string', 'max' => 100],
            [['address', 'bank'], 'string', 'max' => 250],
            [['telefon_main', 'telefon_mob', 'telefon_home', 'hr', 'mfo', 'city', 'inn'], 'string', 'max' => 50],
            [['okonh'], 'string', 'max' => 70],
            [['setting_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'setting_id' => 'Setting ID',
            'org_name' => 'Org Name',
            'address' => 'Address',
            'telefon_main' => 'Telefon Main',
            'telefon_mob' => 'Telefon Mob',
            'telefon_home' => 'Telefon Home',
            'hr' => 'Hr',
            'mfo' => 'Mfo',
            'bank' => 'Bank',
            'city' => 'City',
            'inn' => 'Inn',
            'okonh' => 'Okonh',
            'direktor' => 'Direktor',
            'summaoy' => 'Summaoy',
            'summakun' => 'Summakun',
            'vat_rate' => 'Vat Rate',
            'vat_value' => 'Vat Value',
            'unit_price' => 'Unit Price',
            'subtotal' => 'Subtotal',
            'send_date' => 'Send Date',
            'summaoy2' => 'Summaoy2',
        ];
    }
}
