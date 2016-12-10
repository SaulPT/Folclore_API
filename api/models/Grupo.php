<?php

namespace api\models;

/**
 * This is the model class for table "grupo".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $concelho_id
 * @property string $data_criacao
 *
 * @property Concelho $concelho
 * @property GrupoAdmin[] $grupoAdmins
 * @property User[] $users
 * @property GrupoContacto $grupoContacto
 * @property GrupoCorpogerente[] $grupoCorpogerentes
 * @property GrupoDanca[] $grupoDancas
 * @property GrupoEvento[] $grupoEventos
 * @property Evento[] $eventos
 * @property GrupoGaleria[] $grupoGalerias
 * @property GrupoGastronomia $grupoGastronomia
 * @property GrupoHistorial $grupoHistorial
 * @property GrupoInstrumento[] $grupoInstrumentos
 * @property GrupoPatrimonio[] $grupoPatrimonios
 * @property GrupoTraje[] $grupoTrajes
 * @property GrupoUtensilio[] $grupoUtensilios
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'concelho_id'], 'required'],
            [['concelho_id'], 'integer'],
            [['data_criacao'], 'safe'],
            [['nome'], 'string', 'max' => 75],
            [['concelho_id'], 'exist', 'skipOnError' => true, 'targetClass' => Concelho::className(), 'targetAttribute' => ['concelho_id' => 'id']],
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
            'concelho_id' => 'Concelho ID',
            'data_criacao' => 'Data Criacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcelho()
    {
        return $this->hasOne(Concelho::className(), ['id' => 'concelho_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoAdmins()
    {
        return $this->hasMany(GrupoAdmin::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('grupo_admin', ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoContacto()
    {
        return $this->hasOne(GrupoContacto::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoCorpogerentes()
    {
        return $this->hasMany(GrupoCorpogerente::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoDancas()
    {
        return $this->hasMany(GrupoDanca::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoEventos()
    {
        return $this->hasMany(GrupoEvento::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id' => 'evento_id'])->viaTable('grupo_evento', ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoGalerias()
    {
        return $this->hasMany(GrupoGaleria::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoGastronomia()
    {
        return $this->hasOne(GrupoGastronomia::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoHistorial()
    {
        return $this->hasOne(GrupoHistorial::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoInstrumentos()
    {
        return $this->hasMany(GrupoInstrumento::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoPatrimonios()
    {
        return $this->hasMany(GrupoPatrimonio::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoTrajes()
    {
        return $this->hasMany(GrupoTraje::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoUtensilios()
    {
        return $this->hasMany(GrupoUtensilio::className(), ['grupo_id' => 'id']);
    }
}
