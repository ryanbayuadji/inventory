<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $category_id
 * @property string $category
 * @property string $active
 * @property integer $created_user
 * @property string $created_date
 * @property integer $modified_user
 * @property string $modified_date
 */
class Categories extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //skenario update kategori
            //created_user dan craeted_date harus diisi pada skenario create
            //modified_user dan modifiedav_date harus diisi pada skenario update
            array('category, active, created_user, created_date', 'required', 'on' => 'create'),
            array('category, active, modified_user, modified_date', 'required', 'on' => 'update'),
            array('created_user, modified_user', 'numerical', 'integerOnly' => true),
            array('category', 'length', 'max' => 100),
            array('active', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('category_id, category, active, created_user, created_date, modified_user, modified_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reluser' => array(self::BELONGS_TO, 'Users', 'created_user')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'category' => 'Category',
            'active' => 'Active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('category', $this->category, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('created_user', $this->created_user);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('modified_user', $this->modified_user);
        $criteria->compare('modified_date', $this->modified_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Categories the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
