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
use gearsoftware\media\widgets\TinyMce;
use gearsoftware\models\User;
use gearsoftware\page\models\Page;
use gearsoftware\widgets\ActiveForm;
use gearsoftware\widgets\LanguagePills;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model gearsoftware\page\models\Page */
/* @var $form gearsoftware\widgets\ActiveForm */
?>

<div class="page-form">

    <?php
    $form = ActiveForm::begin([
                'id' => 'page-form',
                'validateOnBlur' => false,
            ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if ($model->isMultilingual()): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                    
                    <?= $form->field($model, 'content')->widget(TinyMce::className()); ?>

                </div>
            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <?php if (!$model->isNewRecord): ?>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['created_at'] ?> :
                                </label>
                                <span><?= $model->createdDatetime ?></span>
                            </div>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['updated_at'] ?> :
                                </label>
                                <span><?= $model->updatedDatetime ?></span>
                            </div>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['updated_by'] ?> :
                                </label>
                                <span><?= $model->updatedBy->username ?></span>
                            </div>

                        <?php endif; ?>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('core', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('core', 'Cancel'), ['/page/default/index'], ['class' => 'btn btn-default',]) ?>
                            <?php else: ?>
                                <?= Html::submitButton(Yii::t('core', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?=
                                Html::a(Yii::t('core', 'Delete'), ['/page/default/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="record-info">
                        <?=
                                $form->field($model, 'published_at')
                                ->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]);
                        ?>

                        <?= $form->field($model, 'status')->dropDownList(Page::getStatusList()) ?>

                        <?php if (!$model->isNewRecord): ?>
                            <?= $form->field($model, 'created_by')->dropDownList(User::getUsersList()) ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'comment_status')->dropDownList(Page::getCommentStatusList()) ?>

                        <?= $form->field($model, 'view')->dropDownList($this->context->module->viewList) ?>

                        <?= $form->field($model, 'layout')->dropDownList($this->context->module->layoutList) ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
