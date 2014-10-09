<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IDDate
 *
 * @author Ryan Bayuadji
 */
class IDDate {

    //put your code here
    public static function getDate($date) {
        $date = strval($date);
        return date('d', strtotime($date)) . ' ' . self::getMonth(date('m', strtotime($date))) . ' ' . date('Y', strtotime($date));
    }

    public static function getMonth($month) {        
        $month = strval($month);
        $value = '';
        switch ($month) {
            case '01':
                $value = 'Januari';
                break;
            case '02':
                $value = 'Februari';
                break;
            case '03':
                $value = 'Maret';
                break;
            case '04':
                $value = 'April';
                break;
            case '05':
                $value = 'Mei';
                break;
            case '06':
                $value = 'Juni';
                break;
            case '07':
                $value = 'Juli';
                break;
            case '08':
                $value = 'Agustus';
                break;
            case '09':
                $value = 'September';
                break;
            case '10':
                $value = 'Oktober';
                break;
            case '11':
                $value = 'November';
                break;
            case '12':
                $value = 'Desember';
                break;
            default :
                $value = '';
        }
        return $value;
    }

}

?>
