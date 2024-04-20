<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sede".
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property int $idempresa
 *
 * @property Empresa $idempresa0
 * @property Trabajador[] $trabajadors
 */
class Sede extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sede';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'idempresa'], 'required'],
            [['idempresa'], 'integer'],
            [['nombre', 'direccion'], 'string', 'max' => 255],
            [['idempresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['idempresa' => 'id']],
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
            'direccion' => 'Direccion',
            'idempresa' => 'Idempresa',
        ];
    }

    /**
     * Gets query for [[Idempresa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdempresa0()
    {
        return $this->hasOne(Empresa::class, ['id' => 'idempresa']);
    }

    /**
     * Gets query for [[Trabajadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadors()
    {
        return $this->hasMany(Trabajador::class, ['idsede' => 'id']);
    }
}
