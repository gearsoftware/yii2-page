<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use gearsoftware\helpers\Html;

/* @var $this yii\web\View */
/* @var $model gearsoftware\page\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('core/page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <?= Html::a(Yii::t('core', 'Edit'), ['/page/default/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('core', 'Delete'), ['/page/default/delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-default',
                'data' => [
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('core', 'Add New'), ['/page/default/create'], ['class' => 'btn btn-sm btn-primary pull-right']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <h2><?= $model->title ?></h2>
            <?= $model->content ?>
        </div>
    </div>

</div>
