<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clientes".
 *
 * @property int $id
 * @property int $cedula
 * @property string $nombre
 * @property string|null $direccion
 * @property string|null $telefono
 *
 * @property Casos[] $casos
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre'], 'required'],
            [['cedula'], 'integer'],
            [['nombre', 'direccion'], 'string', 'max' => 150],
            [['telefono'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * Gets query for [[Casos]].
     *
     * @return \yii\db\ActiveQuery|CasosQuery
     */
    public function getCasos()
    {
        return $this->hasMany(Casos::className(), ['cliente_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ClientesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientesQuery(get_called_class());
    }
}
