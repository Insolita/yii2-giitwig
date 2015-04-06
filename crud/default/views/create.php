<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator insolita\giitwig\crud\Generator */


?>
{{ set(this,'title',<?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>) }}
{{ set(this, 'params', { 'breadcrumbs' : [{ 'label' : <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url':'index' },{ '' : this.title }] }) }}

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">

    <h1>{{this.title}}</h1>
    {{ this.render('_form',{'model':model}) }}
</div>
