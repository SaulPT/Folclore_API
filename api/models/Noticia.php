<?php

namespace api\models;

/**
 * This is the model class for table "noticia".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $conteudo
 * @property string $data_criacao
 * @property string $data_edicao
 * @property integer $autor_id
 * @property string $imagem
 * @property integer $ativo
 *
 * @property User $autor
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'conteudo', 'autor_id'], 'required'],
            [['conteudo'], 'string'],
            [['data_criacao', 'data_edicao'], 'safe'],
            [['autor_id', 'ativo'], 'integer'],
            [['titulo'], 'string', 'max' => 45],
            [['imagem'], 'string', 'max' => 75],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['autor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'conteudo' => 'Conteudo',
            'data_criacao' => 'Data Criacao',
            'data_edicao' => 'Data Edicao',
            'autor_id' => 'Autor ID',
            'imagem' => 'Imagem',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(User::className(), ['id' => 'autor_id']);
    }
}
