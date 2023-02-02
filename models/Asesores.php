<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Asesores".
 *
 * @property int $id
 * @property int $cedula
 * @property string $nombre
 * @property string $usuario
 * @property string $clave
 *
 * @property Casos[] $casos
 */
class Asesores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'Asesores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'usuario', 'clave'], 'required'],
            [['usuario'], 'match', 'pattern' => "/^.{3,15}$/", 'message' => 'Mínimo 3 y máximo 15 caracteres'],
            [['usuario'], 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Ingrese solo letras y números'],
            [['usuario'], 'unique', 'message' => 'El usuario ya existe.'],
            [['clave'], 'string', 'max' => 16],
            [['clave'], 'match', 'pattern' => "/^.{6,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            [['nombre'], 'string', 'max' => 60],
            [['usuario'], 'string', 'max' => 15]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula' => 'Cédula',
            'nombre' => 'Nombre',
            'usuario' => 'Usuario',
            'clave' => 'Clave',
        ];
    }

    /**
     * Gets query for [[Casos]].
     *
     * @return \yii\db\ActiveQuery|CasosQuery
     */
    public function getCasos()
    {
        return $this->hasMany(Casos::className(), ['asesor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AsesoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AsesoresQuery(get_called_class());
    }
}
