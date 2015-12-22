<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property integer $id
 * @property string $codigo_proyecto
 * @property string $codigo_sne
 * @property string $nombre
 * @property integer $estatus_proyecto
 * @property integer $situacion_presupuestaria
 * @property string $monto_proyecto
 * @property string $descripcion
 * @property integer $clasificacion_sector
 * @property integer $sub_sector
 * @property integer $plan_operativo
 * @property integer $objetivo_general
 *
 * @property AccionEspecificaProyecto[] $accionEspecificaProyectos
 * @property Localizacion[] $localizacions
 * @property ResponsableAdministrativo[] $responsableAdministrativos
 * @property ResponsableProyecto[] $responsableProyectos
 * @property ResponsableTecnico[] $responsableTecnicos
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'estatus_proyecto', 'situacion_presupuestaria', 'plan_operativo', 'objetivo_general'], 'required'],
            [['estatus_proyecto', 'situacion_presupuestaria', 'clasificacion_sector', 'sub_sector', 'plan_operativo', 'objetivo_general'], 'integer'],
            [['monto_proyecto'], 'number'],
            [['descripcion'], 'string'],
            [['codigo_proyecto', 'codigo_sne', 'nombre'], 'string', 'max' => 45],
            [['codigo_proyecto'], 'unique'],
            [['codigo_sne'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_proyecto' => 'Codigo Proyecto',
            'codigo_sne' => 'Codigo Sne',
            'nombre' => 'Nombre',
            'estatus_proyecto' => 'Estatus Proyecto',
            'situacion_presupuestaria' => 'Situacion Presupuestaria',
            'monto_proyecto' => 'Monto Proyecto',
            'descripcion' => 'Descripcion',
            'clasificacion_sector' => 'Clasificacion Sector',
            'sub_sector' => 'Sub Sector',
            'plan_operativo' => 'Plan Operativo',
            'objetivo_general' => 'Objetivo General',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionEspecificaProyectos()
    {
        return $this->hasMany(AccionEspecificaProyecto::className(), ['id_proyecto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacions()
    {
        return $this->hasMany(Localizacion::className(), ['id_proyecto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsableAdministrativos()
    {
        return $this->hasMany(ResponsableAdministrativo::className(), ['id_proyecto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsableProyectos()
    {
        return $this->hasMany(ResponsableProyecto::className(), ['id_proyecto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsableTecnicos()
    {
        return $this->hasMany(ResponsableTecnico::className(), ['id_proyecto' => 'id']);
    }
}
