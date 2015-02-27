<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "address".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $street_address
 * @property string $city
 * @property string $country
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class Address extends \yii\db\ActiveRecord
{
    public $profile = 'Default Profile';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    public function behaviors()
    {
        return [
            'class' => TimestampBehavior::className(),
        ];
    }

    /**
     * Limit fields returned in API call
     */
    public function fields()
    {
        return [
            'id',
            'user_id',
            'street_address',
            'city',
            'country',
            'profile',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['street_address', 'city', 'country'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'street_address' => 'Street Address',
            'city' => 'City',
            'country' => 'Country',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
