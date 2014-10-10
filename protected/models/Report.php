<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author 
 */
class Report extends CFormModel {

    //put your code here
    public $tgl_awal;
    public $tgl_akhir;

    public function rules() {
        return array(
            array('tgl_awal, tgl_akhir', 'required', 'on' => 'cek')
        );
    }

}

?>
