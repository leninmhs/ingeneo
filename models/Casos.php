<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Casos".
 *
 * @property int $id
 * @property string $numero_caso
 * @property string $descripcion
 * @property string|null $fecha_creacion
 * @property int $cliente_id
 * @property int $asesor_id
 *
 * @property Asesores $asesor
 * @property Clientes $cliente
 */
class Casos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Casos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero_caso', 'descripcion', 'cliente_id', 'asesor_id'], 'required'],
            [['cliente_id', 'asesor_id'], 'integer'],
            [['numero_caso'], 'unique', 'message' => 'El número ya se encuentra asignado a un caso'],
            [['fecha_creacion'], 'safe'],
            [['numero_caso'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 250],
            [['asesor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asesores::className(), 'targetAttribute' => ['asesor_id' => 'id']],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero_caso' => 'Num Caso',
            'descripcion' => 'Descripción',
            'fecha_creacion' => 'Fecha Creado',
            'cliente_id' => 'Cliente',
            'asesor_id' => 'Asesor',
        ];
    }

    /**
     * Gets query for [[Asesor]].
     *
     * @return \yii\db\ActiveQuery|AsesoresQuery
     */
    public function getAsesor()
    {
        return $this->hasOne(Asesores::className(), ['id' => 'asesor_id']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery|ClientesQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'cliente_id']);
    }

    /**
     * {@inheritdoc}
     * @return CasosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CasosQuery(get_called_class());
    }
}
