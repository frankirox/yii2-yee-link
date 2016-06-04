<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yeesoft\link\models\Link */

$this->title = Yii::t('yee', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/link', 'Redirects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>
