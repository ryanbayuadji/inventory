<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author Ryan Bayu Adji
 */
class WebUser extends CWebUser {

    public function isAdmin() {
        $user = Users::model()->findByPk($this->id);
        return ($user->level == 'Administrator');
    }

}

?>
