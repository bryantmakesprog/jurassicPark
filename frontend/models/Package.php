<?php

namespace app\models;

use Yii;

//For shopping cart.
use yz\shoppingcart;

/**
 * This is the model class for table "package".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $adultPrice
 * @property string $childPrice
 * @property integer $includesGeneticsTour
 * @property integer $includesSafariTour
 * @property integer $includesFood
 * @property integer $includesHotel
 */
class Package extends \yii\db\ActiveRecord implements \yz\shoppingcart\CartPositionInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adultPrice', 'childPrice'], 'required'],
            [['description'], 'string'],
            [['adultPrice', 'childPrice'], 'number'],
            [['includesGeneticsTour', 'includesSafariTour', 'includesFood', 'includesHotel'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
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
            'adultPrice' => 'Adult Price',
            'childPrice' => 'Child Price',
            'includesGeneticsTour' => 'Includes Genetics Tour',
            'includesSafariTour' => 'Includes Safari Tour',
            'includesFood' => 'Includes Food',
            'includesHotel' => 'Includes Hotel',
        ];
    }
    
    public function getBooleanOptions()
    {
        return array(0 => "False", 1 => "True");
    }
    
    //SHOPPING FUNCTIONS////////////////////////////////////////////////////////
    
    use \yz\shoppingcart\CartPositionTrait;
    
    public function getPrice()
    {
        return $this->adultPrice;
    }
    
    public function getId()
    {
        return $this->id;
    }
}
