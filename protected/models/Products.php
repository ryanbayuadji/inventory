<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $product_id
 * @property integer $category_id
 * @property integer $supplier_id
 * @property string $product
 * @property integer $price
 * @property integer $po_price
 * @property integer $pm_price
 * @property integer $stock
 * @property string $active
 * @property string $description
 * @property integer $created_user
 * @property string $created_date
 * @property integer $modified_user
 * @property string $modified_date
 */
class Products extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    private $start_due_date = 10;

    public function tableName() {
        return 'products';
    }

    public function primaryKey() {
        return 'product_id';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, supplier_id, product, price, po_price, pm_price, stock, active, description, created_user, created_date, due_date', 'required', 'on' => 'create'),
            array('category_id, supplier_id, product, price, po_price, pm_price, stock, active, description, modified_user, modified_date, due_date', 'required', 'on' => 'update'),
            array('category_id, supplier_id, price, po_price, pm_price, stock, created_user, modified_user', 'numerical', 'integerOnly' => true),
            array('product', 'length', 'max' => 128),
            array('active', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('product_id, category_id, supplier_id, product, price, po_price, pm_price, stock, active, description, created_user, created_date, modified_user, modified_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rel_categories' => array(self::BELONGS_TO, 'Categories', 'category_id'), //relasi dari model product ke model categories
            'rel_supplier' => array(self::BELONGS_TO, 'Suppliers', 'supplier_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'product_id' => 'Kode',
            'category_id' => 'Kategory',
            'supplier_id' => 'Suplayer',
            'product' => 'Produk',
            'price' => 'Harga Jual',
            'po_price' => 'Harga Modal',
            'pm_price' => 'Harga Terendah',
            'stock' => 'Stok',
            'active' => 'Aktif',
            'due_date' => 'Kadaluarsa',
            'description' => 'Deskripsi',
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

        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('supplier_id', $this->supplier_id);
        $criteria->compare('product', $this->product, true);
        $criteria->compare('price', $this->price);
        $criteria->compare('po_price', $this->po_price);
        $criteria->compare('pm_price', $this->pm_price);
        $criteria->compare('stock', $this->stock);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('description', $this->description, true);
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
     * @return Products the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPrice() {
        return 'Rp. ' . number_format($this->price, 2, ',', '.');
    }

    public function getPoPrice() {
        return 'Rp. ' . number_format($this->po_price, 2, ',', '.');
    }

    public function getPmPrice() {
        return 'Rp. ' . number_format($this->pm_price, 2, ',', '.');
    }

    public function getTotalPrice() {
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT SUM(price) FROM products");
        return "Total Rp. " . number_format($command->queryScalar(), 2, ',', '.');
    }

    public function getTotalPoPrice() {
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT SUM(po_price) FROM products");
        return "Total Rp. " . number_format($command->queryScalar(), 2, ',', '.');
    }

    public function getTotalPmPrice() {
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT SUM(pm_price) FROM products");
        return "Total Rp. " . number_format($command->queryScalar(), 2, ',', '.');
    }

    public function getDueDate() {
        $label = $this->due_date;
        $due_date = date('Y-m-d', strtotime("-$this->start_due_date days", strtotime($this->due_date)));
        if (date('Y-m-d') >= $due_date) { //2014-10-20
            return '<span class="btn-small btn-danger">' . $label . '</span>';
        } else {
            return $label;
        }
    }

}
