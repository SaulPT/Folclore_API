<?php

namespace api\models;

/**
 * This is the model class for table "concelho".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $distrito_id
 *
 * @property Distrito $distrito
 * @property Evento[] $eventos
 * @property Grupo[] $grupos
 * @property ParceriaConcelho[] $parceriaConcelhos
 * @property Parceria[] $parcerias
 */
class Concelho extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concelho';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'distrito_id'], 'required'],
            [['distrito_id'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['distrito_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distrito::className(), 'targetAttribute' => ['distrito_id' => 'id']],
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
            'distrito_id' => 'Distrito ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrito()
    {
        return $this->hasOne(Distrito::className(), ['id' => 'distrito_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['concelho_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['concelho_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParceriaConcelhos()
    {
        return $this->hasMany(ParceriaConcelho::className(), ['concelho_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParcerias()
    {
        return $this->hasMany(Parceria::className(), ['id' => 'parceria_id'])->viaTable('parceria_concelho', ['concelho_id' => 'id']);
    }
}
