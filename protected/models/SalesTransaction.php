<?php

/**
 * This is the model class for table "sales_transaction".
 *
 * The followings are the available columns in table 'sales_transaction':
 * @property integer $trx_id
 * @property integer $product_id
 * @property integer $sales_price
 * @property integer $profit
 * @property double $sales_qty
 * @property integer $sales_stock
 * @property integer $subtotal
 * @property string $sales_date
 * @property string $sales_time
 * @property string $description
 * @property integer $user_id
 */
class SalesTransaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sales_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, sales_price, profit, sales_qty, sales_stock, subtotal, sales_date, sales_time, description, user_id', 'required'),
			array('product_id, sales_price, profit, sales_stock, subtotal, user_id', 'numerical', 'integerOnly'=>true),
			array('sales_qty', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('trx_id, product_id, sales_price, profit, sales_qty, sales_stock, subtotal, sales_date, sales_time, description, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'trx_id' => 'Trx',
			'product_id' => 'Product',
			'sales_price' => 'Sales Price',
			'profit' => 'Profit',
			'sales_qty' => 'Sales Qty',
			'sales_stock' => 'Sales Stock',
			'subtotal' => 'Subtotal',
			'sales_date' => 'Sales Date',
			'sales_time' => 'Sales Time',
			'description' => 'Description',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('trx_id',$this->trx_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('sales_price',$this->sales_price);
		$criteria->compare('profit',$this->profit);
		$criteria->compare('sales_qty',$this->sales_qty);
		$criteria->compare('sales_stock',$this->sales_stock);
		$criteria->compare('subtotal',$this->subtotal);
		$criteria->compare('sales_date',$this->sales_date,true);
		$criteria->compare('sales_time',$this->sales_time,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalesTransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
