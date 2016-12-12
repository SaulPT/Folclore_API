<?php

namespace api\models;

/**
 * This is the model class for table "grupo_admin".
 *
 * @property integer $grupo_id
 * @property integer $user_id
 *
 * @property Grupo $grupo
 * @property User $user
 */
class GrupoAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grupo_id', 'user_id'], 'required'],
            [['grupo_id', 'user_id'], 'integer'],
            [['grupo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['grupo_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grupo_id' => 'Grupo ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['id' => 'grupo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
