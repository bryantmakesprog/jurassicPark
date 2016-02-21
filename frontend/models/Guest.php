<?php

namespace app\models;

use Yii;

use app\models\Attraction;
use app\models\Log;

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
    
    //Check in at the given attraction. Create a log and add us to queue.
    public function checkInAtAttraction($attractionId)
    {
//TODO Check if our ticket is still valid!
        $attraction = Attraction::findOne($attractionId);
        if($attraction)
        {
            //Create a log.
            $log = new Log();
            $log->ticket = $this->ticket;
            $log->guest = $this->id;
            $log->action = "Checked In";
            $log->location = $attraction->name;
            $date = new DateTime();
            $log->timestamp = $date->getTimestamp();
            $log->save();
            //Add us to queue.
            $attraction->incrementQueue();
        }
        else
        {
            throw new \yii\base\Exception( "No attraction has the ID: '$attractionId'" );
        }
    }
    
    //Check out at the given attraction. Create a log and remove us from queue.
    public function checkOutAtAttraction($attractionId)
    {
        $attraction = Attraction::findOne($attractionId);
        if($attraction)
        {
            //Create a log.
            $log = new Log();
            $log->ticket = $this->ticket;
            $log->guest = $this->id;
            $log->action = "Checked Out";
            $log->location = $attraction->name;
            $date = new DateTime();
            $log->timestamp = $date->getTimestamp();
            $log->save();
            //Add us to queue.
            $attraction->decrementQueue();
        }
        else
        {
            throw new \yii\base\Exception( "No attraction has the ID: '$attractionId'" );
        }
    }
    
    public function createFromTicket($ticket, $firstName, $lastName)
    {
        $guest = new Guest();
        $guest->ticket = $ticket->id;
        $guest->user = $ticket->owner;
        $guest->firstName = $firstName;
        $guest->lastName = $lastName;
        $guest->redeemedAt = $ticket->redeemedAt;
        $guest->save();
    }
}
