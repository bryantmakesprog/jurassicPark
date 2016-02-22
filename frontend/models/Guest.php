<?php

namespace app\models;

use Yii;

use app\models\Attraction;
use app\models\Log;
use app\models\Ticket;

/**
 * This is the model class for table "guest".
 *
 * @property integer $id
 * @property integer $ticket
 * @property integer $user
 * @property string $firstName
 * @property string $lastName
 * @property integer $redeemedAt
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket', 'user', 'firstName', 'lastName', 'redeemedAt'], 'required'],
            [['ticket', 'user', 'redeemedAt'], 'integer'],
            [['firstName', 'lastName'], 'string', 'max' => 255]
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
            'user' => 'User',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'redeemedAt' => 'Redeemed At',
        ];
    }    
}
