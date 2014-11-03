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

        $criteria = new CDbCriteria();
        $criteria->addBetweenCondition('sales_date', date('Y-m-d', strtotime($valueStart)), date('Y-m-d', strtotime($valueEnd)));
        $dataProvider = SalesTransaction::model()->findAll($criteria);
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

        $objPHPExcel->getActiveSheet()
                ->mergeCells('A1:H1')
                ->mergeCells('A2:H2')
                ->mergeCells('A3:H3')
                ->setCellValue('A1', 'PT. ASIA PARAMITA INDAH')
                ->setCellValue('A2', 'Jl. Dokter Suparno 901 Purwokerto 53122')
                ->setCellValue('A3', 'Laporan Penjualan');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A4', 'No')
                ->setCellValue('B4', 'Waktu')
                ->setCellValue('C4', 'Produk')
                ->setCellValue('D4', 'Harga')
                ->setCellValue('E4', 'Keuntungan')
                ->setCellValue('F4', 'Sub Total')
                ->setCellValue('G4', 'Qty')
                ->setCellValue('H4', 'Stock');

        // Set fills
        $objPHPExcel->getActiveSheet()->getStyle('A4:H4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A4:H4')->getFill()->getStartColor()->setRGB('E0E0E0');

        $objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray(array(
            'font' => array(
                'size' => 18,
                'bold' => true,
                'color' => array(
                    'rgb' => '000000'
                ),
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
        ));
        $objPHPExcel->getActiveSheet()->getStyle("A2")->applyFromArray(array(
            'font' => array(
                'size' => 12,
                'bold' => true,
                'color' => array(
                    'rgb' => '000000'
                ),
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
        ));
        $objPHPExcel->getActiveSheet()->getStyle("A3")->applyFromArray(array(
            'font' => array(
                'size' => 12,
                'bold' => true,
                'color' => array(
                    'rgb' => '000000'
                ),
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            ),
        ));
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

        $i = 5;
        $total_keseluruhan = 0;
        $total_keuntungan = 0;
        $persepuluhan = 0;
        $beban_toko = 0;
        $untung_bersih = 0;
        foreach ($model as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, ($i - 4))
                    ->setCellValue('B' . $i, IDDate::getDate($data['sales_date']))
                    ->setCellValue('C' . $i, $data['rel_product']['product'])
                    ->setCellValue('D' . $i, 'Rp. ' . number_format($data['sales_price'], 2, ',', '.'))
                    ->setCellValue('E' . $i, 'Rp. ' . number_format($data['profit'], 2, ',', '.'))
                    ->setCellValue('F' . $i, 'Rp. ' . number_format($data['subtotal'], 2, ',', '.'))
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
            $total_keseluruhan+=$data->sales_price;
            $total_keuntungan+=$data->profit;
        }
        $objPHPExcel->getActiveSheet()
                ->mergeCells('A' . ($i + 1) . ':' . 'C' . ($i + 1))
                ->mergeCells('A' . ($i + 2) . ':' . 'C' . ($i + 2))
                ->mergeCells('A' . ($i + 3) . ':' . 'C' . ($i + 3))
                ->mergeCells('A' . ($i + 4) . ':' . 'C' . ($i + 4))
                ->mergeCells('A' . ($i + 5) . ':' . 'C' . ($i + 5))
                ->mergeCells('A' . ($i + 6) . ':' . 'C' . ($i + 6))
                ->mergeCells('D' . ($i + 1) . ':' . 'F' . ($i + 1))
                ->mergeCells('D' . ($i + 2) . ':' . 'F' . ($i + 2))
                ->mergeCells('D' . ($i + 3) . ':' . 'F' . ($i + 3))
                ->mergeCells('D' . ($i + 4) . ':' . 'F' . ($i + 4))
                ->mergeCells('D' . ($i + 5) . ':' . 'F' . ($i + 5))
                ->mergeCells('D' . ($i + 6) . ':' . 'F' . ($i + 6))
                ->setCellValue('A' . ($i + 1), 'Total Keseluruhan')
                ->setCellValue('A' . ($i + 2), 'Total Keuntungan')                
                ->setCellValue('A' . ($i + 3), 'Periode Laporan Penjualan')
                ->setCellValue('D' . ($i + 1), 'Rp. ' . number_format($total_keseluruhan, 2, ',', '.'))
                ->setCellValue('D' . ($i + 2), 'Rp. ' . number_format($total_keuntungan, 2, ',', '.'))                
                ->setCellValue('D' . ($i + 3), IDDate::getDate($tgl_awal) . ' s/d ' . IDDate::getDate($tgl_akhir));


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