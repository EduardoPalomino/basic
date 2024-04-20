<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $apellido
 * @property string $email
 * @property string|null $telefono
 * @property string|null $direccion
 * @property string|null $fecha_nacimiento
 * @property int $idSexo
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Sexo $idSexo0
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'idSexo'], 'required'],
            [['fecha_nacimiento', 'created_at', 'updated_at'], 'safe'],
            [['idSexo'], 'integer'],
            [['nombre', 'apellido', 'email', 'direccion'], 'string', 'max' => 180],
            [['telefono'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['idSexo'], 'exist', 'skipOnError' => true, 'targetClass' => Sexo::class, 'targetAttribute' => ['idSexo' => 'id']],
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
            'apellido' => 'Apellido',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'idSexo' => 'Id Sexo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[IdSexo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdSexo0()
    {
        return $this->hasOne(Sexo::class, ['id' => 'idSexo']);
    }
}
