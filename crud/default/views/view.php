<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator insolita\giitwig\crud\Generator */

$urlParams = $generator->generateTwigUrlParams();
?>
{{ use('yii/widgets/DetailView') }}

{{ set(this,'title', model.<?= $generator->getNameAttribute() ?>) }}
{{ set(this, 'params', { 'breadcrumbs' : [{ 'label' : <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url':['index'] },{ 'label' : this.title }] }) }}

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <h1>{{this.title}}</h1>

    <p>
        <a href="{{url('update', <?= $urlParams ?>)}}" class="btn btn-primary"><?= $generator->generateTString('Update') ?></a>
        <a href="{{url('delete', <?= $urlParams ?>)}}" class="btn btn-danger" data-method="post" data-confirm="<?= $generator->generateTString('Are you sure you want to delete this item?') ?>"><?= $generator->generateTString('Delete') ?></a>
    </p>
    {{
        detail_view_widget({
            'model':model,
            'attributes':[
    <?php
    if (($tableSchema = $generator->getTableSchema()) === false) {
        foreach ($generator->getColumnNames() as $name) {
            echo "            {'attribute':'" . $name . "'},\n";
        }
    } else {
        foreach ($generator->getTableSchema()->columns as $column) {
            $format = $generator->generateColumnFormat($column);
            echo "            {'attribute':'" . $column->name ."'". ($format === 'text' ? '' : ",'format':'" . $format. "'")." },\n";
        }
    }
    ?>
            ]
        })
    }}



</div>
