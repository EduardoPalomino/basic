<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property string $nombre
 * @property string $ruc
 * @property string $razon_social
 * @property string $direccion
 *
 * @property Sede[] $sedes
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'ruc', 'razon_social', 'direccion'], 'required'],
            [['nombre', 'ruc', 'razon_social', 'direccion'], 'string', 'max' => 180],
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
            'ruc' => 'Ruc',
            'razon_social' => 'Razon Social',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * Gets query for [[Sedes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSedes()
    {
        return $this->hasMany(Sede::class, ['idempresa' => 'id']);
    }
}
