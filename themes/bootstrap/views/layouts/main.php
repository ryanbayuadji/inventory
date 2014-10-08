<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php Yii::app()->bootstrap->register(); ?>
    </head>

    <body>

        <?php
        if (Yii::app()->user->isGuest) {
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => array(
                            array('label' => 'Home', 'icon' => 'home', 'url' => array('/site/index')),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ),
                ),
            ));
        } else {
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => array(
                            array('label' => 'Home', 'icon' => 'home', 'url' => array('/site/index')),
                            array('label' => 'User', 'icon' => 'user', 'url' => array('#'),
                                'items' => array(
                                    array('label' => 'User', 'url' => array('/users/admin')),
                                    array('label' => 'Supplier', 'url' => array('/suppliers/admin')),
                                ),
                                'visible' => Yii::app()->user->isAdmin()),
                            array('label' => 'Product', 'icon' => 'th-large', 'url' => array('/products/admin')),
                            array('label' => 'Transaction', 'icon' => 'shopping-cart', 'url' => array('/salesTransaction/admin')),
                            array('label' => 'Merk', 'icon' => 'tags', 'url' => array('/merk/admin')),
                            array('label' => 'Supplier', 'icon' => 'calendar', 'url' => array('/supplier/admin')),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'off', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ),
                ),
            ));
        }
        ?>

        <div class="container" id="page">

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
