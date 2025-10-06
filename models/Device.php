<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $serial
 * @property string|null $name
 * @property string|null $stored_in
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Device extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'stored_in'], 'default', 'value' => null],
            [['created_at', 'updated_at'], 'default'],
            [['serial'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['serial'], 'string', 'max' => 9],
            [['name'], 'string', 'max' => 32],
            [['stored_in'], 'string', 'max' => 16],
            [['stored_in'], 'trim'],
            [['stored_in'], 'validateEnteredStore'],
            [['serial'], 'unique'],
            ['serial', 'match', 'pattern' => "/^[A-Z]{3}\d{6}$/",
                'message' => 'Серийный номер указывается в формате ABC123456'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial' => 'Серийный номер',
            'name' => 'Имя',
            'stored_in' => 'Хранится на складе',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    public function retrieveStoresArray()
    {
        $stores = Store::find()->all();

        return ArrayHelper::getColumn($stores, 'name');
    }

    public function validateEnteredStore($attribute, $params)
    {
        //Не срабатывает с типом dropDownList
        if (!in_array($this->$attribute, $this->retrieveStoresArray())) 
        {
            $this->addError($attribute, 'Укажите название существующего склада либо оставьте поле пустым');
        }
            
    }
}
