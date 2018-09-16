<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use gearsoftware\grid\GridView;
use gearsoftware\helpers\Html;
use gearsoftware\models\User;
use gearsoftware\page\models\Page;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel gearsoftware\page\models\search\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('core/page', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
	Html::a('<i class="ion-ios-plus-outline"></i> '. Yii::t('core', 'Add New'), ['create'], ['class' => 'btn btn-primary btn-sm'])
];

echo GridView::widget([
	'id' => 'page-grid',
	'model' =>  Page::className(),
	'title' => $this->title,
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'quickLinksOptions' => [
		['label' => Yii::t('core', 'All'), 'filterWhere' => []],
		['label' => Yii::t('core', 'Published'), 'filterWhere' => ['status' => Page::STATUS_PUBLISHED]],
		['label' => Yii::t('core', 'Pending'), 'filterWhere' => ['status' => Page::STATUS_PENDING]],
	],
	'bulkActionOptions' => [
		'actions' => [
			Url::to(['bulk-activate']) => Yii::t('core', 'Publish'),
			Url::to(['bulk-deactivate']) => Yii::t('core', 'Unpublish'),
			Url::to(['bulk-delete']) => Yii::t('core', 'Delete'),
		]
	],
	'columns' => [
		[
			'class' => 'gearsoftware\grid\columns\SerialColumn'
		],
		'title',
		[
			'attribute' => 'created_by',
			'label' => Yii::t('core', 'Username'),
			'value' => function (Page $model) {
				return $model->author->username;
			},
			'filterType' => GridView::FILTER_SELECT2,
			'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
			'filterWidgetOptions' => [
				'pluginOptions' => ['allowClear' => true],
			],
			'filterInputOptions' => [
				'placeholder' => Yii::t('core', 'Select an {element}...', ['element' => Yii::t('core/user', 'User')])
			],
			'format' => 'raw'
		],
		[
			'class' => 'gearsoftware\grid\columns\StatusColumn',
			'attribute' => 'status',
			'optionsArray' => Page::getStatusOptionsList(),
			'filterType' => GridView::FILTER_SELECT2,
			'filterWidgetOptions' => [
				'pluginOptions' => ['allowClear' => true],
			],
			'filterInputOptions' => [
				'placeholder' => Yii::t('core', 'Select a {element}...', ['element' => Yii::t('core', 'Status')])
			],
			'format' => 'raw'
		],
		[
			'attribute' => 'published_at',
			'value' => function (Page $model) {
				return $model->publishedDate;
			},
			'filterType' => 'gearsoftware\grid\DateRangePicker',
			'format' => 'raw',
		],
		[
			'class' => 'gearsoftware\grid\columns\ActionColumn',
			'dropdown' => true,
		],
		[
			'class' => 'gearsoftware\grid\columns\CheckboxColumn',
		],
	]
]);
