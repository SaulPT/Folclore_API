<?php

namespace api\models;

/**
 * This is the model class for table "user_token".
 *
 * @property integer $user_id
 * @property string $token
 * @property string $dispositivo
 * @property string $data_criacao
 *
 * @property User $user
 */
class UserToken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'token', 'dispositivo'], 'required'],
            [['user_id'], 'integer'],
            [['data_criacao'], 'safe'],
            [['token'], 'string', 'max' => 200],
            [['dispositivo'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'token' => 'Token',
            'dispositivo' => 'Dispositivo',
            'data_criacao' => 'Data Criacao',
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
