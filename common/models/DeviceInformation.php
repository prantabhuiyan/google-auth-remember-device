<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device_information".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $remember_device
 * @property string $user_agent
 */
class DeviceInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device_information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_agent'], 'required'],
            [['user_id'], 'integer'],
            [['cookie_name', 'user_agent'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'cookie_name' => 'Cookie Name',
            'user_agent' => 'User Agent',
        ];
    }
}
