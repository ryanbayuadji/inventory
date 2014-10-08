<?php

/**
 * This is the model class for table "supp_transaction".
 *
 * The followings are the available columns in table 'supp_transaction':
 * @property integer $trx_id
 * @property integer $supplier_id
 * @property integer $product_id
 * @property integer $supp_price
 * @property integer $supp_qty
 * @property integer $subtotal
 * @property string $description
 * @property string $buys_date
 * @property string $buys_time
 * @property integer $user_id
 */
class SuppTransaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supp_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supplier_id, product_id, supp_price, supp_qty, subtotal, description, buys_date, buys_time, user_id', 'required'),
			array('supplier_id, product_id, supp_price, supp_qty, subtotal, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('trx_id, supplier_id, product_id, supp_price, supp_qty, subtotal, description, buys_date, buys_time, user_id', 'safe', 'on'=>'search'),
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
			'supplier_id' => 'Supplier',
			'product_id' => 'Product',
			'supp_price' => 'Supp Price',
			'supp_qty' => 'Supp Qty',
			'subtotal' => 'Subtotal',
			'description' => 'Description',
			'buys_date' => 'Buys Date',
			'buys_time' => 'Buys Time',
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
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('supp_price',$this->supp_price);
		$criteria->compare('supp_qty',$this->supp_qty);
		$criteria->compare('subtotal',$this->subtotal);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('buys_date',$this->buys_date,true);
		$criteria->compare('buys_time',$this->buys_time,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppTransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
