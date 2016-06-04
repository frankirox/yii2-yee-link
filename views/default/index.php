<?php

use yeesoft\grid\GridPageSize;
use yeesoft\grid\GridQuickLinks;
use yeesoft\grid\GridView;
use yeesoft\helpers\Html;
use yeesoft\models\User;
use yeesoft\link\models\Link;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\link\models\search\LinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/link', 'Redirects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-index">

    <div class="row">
        <div class="col-sm-6">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/link/default/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'page-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'link-grid-pjax']) ?>

            <?=
            GridView::widget([
                'id' => 'link-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'link-grid',
                    'actions' => [
                        Url::to(['bulk-delete']) => Yii::t('yii', 'Delete'),
                    ]
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'attribute' => 'slug',
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'controller' => '/link/default',
                        'title' => function (Link $model) {
                            return Html::a($model->slug, ['/link/default/update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    'url',
                    'status_code',
                    [
                        'attribute' => 'created_by',
                        'filter' => User::getUsersList(),
                        'value' => function (Link $model) {
                            return Html::a($model->author->username,
                                ['/user/default/update', 'id' => $model->created_by],
                                ['data-pjax' => 0]);
                        },
                        'format' => 'raw',
                        'visible' => User::hasPermission('viewUsers'),
                        'options' => ['style' => 'width:180px'],
                    ],
                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


