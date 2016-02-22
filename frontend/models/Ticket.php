<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property string $owner
 * @property string $status
 * @property integer $issuedAt
 * @property integer $redeemedAt
 * @property integer $package
 * @property string $firstName
 * @property string $lastName
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner', 'issuedAt', 'package', 'firstName', 'lastName', 'status'], 'required'],
            [['issuedAt', 'redeemedAt', 'package', 'owner'], 'integer'],
            [['status', 'firstName', 'lastName'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner' => 'Owner',
            'status' => 'Status',
            'issuedAt' => 'Issued At',
            'redeemedAt' => 'Redeemed At',
            'package' => 'Package',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
        ];
    }
    
    public function generateTicket($owner, $package, $firstName, $lastName, $timestamp = -1)
    {
        $model = new Ticket();
        $model->owner = $owner;
        $model->package = $package;
        $model->firstName = $firstName;
        $model->lastName = $lastName;
        if($timestamp == -1)
        {
            $date = new \DateTime();
            $model->issuedAt = $date->getTimestamp();
        }
        else
            $model->issuedAt = $timestamp;
        $model->status = 'active';
        $model->save();
    }
    
    public function isRedeemable()
    {
        return $this->status == 'active';
    }
    
    public function isRedeemed()
    {
        return $this->status == 'redeemed';
    }
    
    public function redeemTicket()
    {
        if($this->status == 'active')
        {
            $this->status = 'redeemed';
            $date = new \DateTime();
            $this->redeemedAt = $date->getTimestamp();
            $this->save();
        }
    }
    
    public function rejectTicket()
    {
        if($this->status == 'redeemed')
        {
            $this->status = 'expired';
            $this->save();
        }
    }
}
