<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model gearsoftware\page\models\Page */

$this->title = Yii::t('core', 'Update "{item}"', ['item' => $model->title]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('core/page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('core', 'Update');
?>

<div class="page-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>


