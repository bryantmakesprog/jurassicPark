<?php

namespace app\models;

use Yii;
use app\models\Attraction;

/**
 * This is the model class for table "log".
 *
 * @property integer $id
 * @property integer $ticket
 * @property integer $guest
 * @property string $action
 * @property string $location
 * @property integer $timestamp
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket', 'guest', 'action', 'location', 'timestamp'], 'required'],
            [['ticket', 'guest', 'timestamp'], 'integer'],
            [['action', 'location'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket' => 'Ticket',
            'guest' => 'Guest',
            'action' => 'Action',
            'location' => 'Location',
            'timestamp' => 'Timestamp',
        ];
    }
    
    public function getActions_checkInOut()
    {
        return ['checked in' => "Check In", 'checked out' => "Check Out"];
    }
    
    public function getLocations_attractions()
    {
        $locations = array();
        $allAttractions = Attraction::find()->all();
        foreach($allAttractions as $attraction)
        {
            $locations[$attraction->name] = $attraction->name;
        }
        return $locations;
    }
}
