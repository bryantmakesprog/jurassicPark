<?php

namespace app\models;

use Yii;

use app\models\Attraction;

/**
 * This is the model class for table "attractionmedia".
 *
 * @property integer $id
 * @property integer $attraction
 * @property string $url
 */
class AttractionMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attractionmedia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attraction', 'url'], 'required'],
            [['attraction'], 'integer'],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attraction' => 'Attraction',
            'url' => 'Url',
        ];
    }
    
    public function getAttractionOptions()
    {
        $attractionOptions = array();
        foreach(Attraction::find()->all() as $attraction)
        {
            $attractionOptions[$attraction->id] = $attraction->name;
        }
        return $attractionOptions;
    }
}
