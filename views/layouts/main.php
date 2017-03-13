<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

?>
<?php $this->beginPage() ?>
<?php echo $this->renderFile('@app/views/head.php'); ?>

<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
<?php $this->endPage() ?>
<?php echo $this->renderFile('@app/views/foot.php'); ?>

