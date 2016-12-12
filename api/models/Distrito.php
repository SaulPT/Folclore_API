<?php

namespace api\models;

/**
 * This is the model class for table "distrito".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property Concelho[] $concelhos
 */
class Distrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcelhos()
    {
        return $this->hasMany(Concelho::className(), ['distrito_id' => 'id']);
    }
}
