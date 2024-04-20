<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajador".
 *
 * @property int $id
 * @property string $nombre
 * @property string $documento_identidad
 * @property string $cargo
 * @property int $idsede
 *
 * @property Sede $idsede0
 */
class Trabajador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trabajador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'documento_identidad', 'cargo', 'idsede'], 'required'],
            [['idsede'], 'integer'],
            [['nombre', 'documento_identidad', 'cargo'], 'string', 'max' => 180],
            [['idsede'], 'exist', 'skipOnError' => true, 'targetClass' => Sede::class, 'targetAttribute' => ['idsede' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'documento_identidad' => 'Documento Identidad',
            'cargo' => 'Cargo',
            'idsede' => 'Idsede',
        ];
    }

    /**
     * Gets query for [[Idsede0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdsede0()
    {
        return $this->hasOne(Sede::class, ['id' => 'idsede']);
    }
}
