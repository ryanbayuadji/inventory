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
                            array('label' => 'Login', 'icon' => 'lock', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
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
                            array('label' => 'Pengguna', 'icon' => 'user', 'url' => '#',
                                'items' => array(
                                    array('label' => 'Pengguna', 'url' => array('/users/admin')),
                                    array('label' => 'Suplayer', 'url' => array('/suppliers/admin')),
                                ),
                                'visible' => Yii::app()->user->isAdmin()),
                            array('label' => 'Man. Produk', 'icon' => 'th-large', 'url' => '#',
                                'items' => array(
                                    array('label' => 'Kategori', 'url' => Yii::app()->createUrl('categories/admin')),
                                    array('label' => 'Produk', 'url' => Yii::app()->createUrl('products/admin')),
                                )
                            ),
                            array('label' => 'Transaksi', 'icon' => 'shopping-cart', 'url' => '#',
                                'items' => array(
                                    array('label' => 'Penjualan', 'url' => Yii::app()->createUrl('salesTransaction/admin')),
                                    array('label' => 'Pembelian', 'url' => Yii::app()->createUrl('suppTransaction/admin')),
                                )
                            ),
                            array('label' => 'Laporan', 'icon' => 'calendar', 'url' => array('/report')),
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

            <footer class="bs-docs-footer">
                Copyright &copy; <?php echo date('Y'); ?> by Ryan Bayuadhi (H1L008036).<br/>
                Universitas Jenderal Soedirman.<br/>                
            </footer><!-- footer -->

        </div><!-- page -->

    </body>
</html>
