<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attraction".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $type
 * @property double $duration
 * @property integer $maxOccupancy
 * @property integer $queueSize
 */
class Attraction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attraction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'type', 'duration', 'maxOccupancy'], 'required'],
            [['description'], 'string'],
            [['type', 'maxOccupancy', 'queueSize'], 'integer'],
            [['duration'], 'number'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'type' => 'Attraction Type',
            'duration' => 'Duration In Minutes',
            'maxOccupancy' => 'Max Occupancy',
            'queueSize' => 'Queue Size',
        ];
    }
    
    public function getTypeOptions()
    {
        return [0 => 'Food', 1 => 'Ride', 2 => 'Exhibit',];
    }
    
    public function getWaitTime()
    {
        return ($this->duration / $this->maxOccupancy) * $this->queueSize;
    }
    
    public function decrementQueue()
    {
        $this->queueSize--;
        if($this->queueSize < 0)
            echo "error";
    }
    
    public function incrementQueue()
    {
        $this->queueSize++;
    }
}
