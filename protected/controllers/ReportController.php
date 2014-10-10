<?php

class ReportController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'excel'),
                'users' => array('@')
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = new Report('cek');

        $valueStart = Yii::app()->request->getParam('tgl_awal', '');
        $valueEnd = Yii::app()->request->getParam('tgl_akhir', '');

        $sql = "SELECT * FROM sales_transaction 
            INNER JOIN products ON products.product_id=sales_transaction.product_id
            WHERE sales_date BETWEEN '$valueStart' AND '$valueEnd'";
        $dataProvider = new CSqlDataProvider($sql, array(
                    'keyField' => 'trx_id'
                ));
        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'valueStart' => $valueStart,
            'valueEnd' => $valueEnd
        ));
    }

    public function actionExcel($tgl_awal, $tgl_akhir) {
        require_once 'PHPExcel/Cell/AdvancedValueBinder.php';

        // Create new PHPExcel object	
        $objPHPExcel = new PHPExcel();

        // MySQL-like timestamp '2008-12-31' or date string
        PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());

        //set date format
        $format_date = array(
            'numberformat' => array(
                'code' => 'DD-MM-YYYY',
            ),
        );

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Aplikasi Inventori")
                ->setTitle("Laporan Inventori");

        //mergecell

        $objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
              
        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A3', 'No')
                ->setCellValue('B3', 'Waktu')
                ->setCellValue('C3', 'Produk')
                ->setCellValue('D3', 'Harga')
                ->setCellValue('E3', 'Keuntungan')
                ->setCellValue('F3', 'Sub Total')
                ->setCellValue('G3', 'Qty')
                ->setCellValue('H3', 'Stock');                

        // Set fills
        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFill()->getStartColor()->setARGB('FF808080');


        $HeadBorderOutlinedata = array(
            'font' => array(
                'bold' => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ),
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                ),
            ),
        );

        $BodyBorderOutlinedata = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ),
            ),
        );

        $styleThinBlackBorderOutlinedata = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $criteria = new CDbCriteria();
        $criteria->addBetweenCondition('sales_date', $tgl_awal, $tgl_akhir);
        $model = SalesTransaction::model()->findAll($criteria);

        $i = 4;
        foreach ($model as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, ($i - 3))
                    ->setCellValue('B' . $i, $data['sales_date'])
                    ->setCellValue('C' . $i, $data['rel_product']['product'])
                    ->setCellValue('D' . $i, $data['sales_price'])
                    ->setCellValue('E' . $i, $data['profit'])
                    ->setCellValue('F' . $i, $data['subtotal'])
                    ->setCellValue('G' . $i, $data['sales_qty'])
                    ->setCellValue('H' . $i, $data['sales_stock']);                    

            //format date
            $objPHPExcel->getActiveSheet()->getStyle('B' . $i)->applyFromArray($format_date);            

            //make a border			
            $objPHPExcel->getActiveSheet()->getStyle('A' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);
            $objPHPExcel->getActiveSheet()->getStyle('B' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);
            $objPHPExcel->getActiveSheet()->getStyle('C' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);
            $objPHPExcel->getActiveSheet()->getStyle('D' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);
            $objPHPExcel->getActiveSheet()->getStyle('E' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);
            $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);
            $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);
            $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->applyFromArray($styleThinBlackBorderOutlinedata);            
            $i++;
        }

        //Applied body border
        $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->applyFromArray($BodyBorderOutlinedata);
        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($BodyBorderOutlinedata);
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($HeadBorderOutlinedata);

        // Set fonts
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Candara');
        $objPHPExcel->getActiveSheet()->getStyle('A2:H' . ($i - 1))->getFont()->setName('Liberation Serif');

        // Set column widths

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

        //set row height
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);


        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Laporan');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);



        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

}