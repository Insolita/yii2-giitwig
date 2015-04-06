<?php
/* @var $this yii\web\View */
/* @var $generator insolita\giitwig\crud\Generator */

$urlParams = $generator->generateTwigUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo '{{ html.a(model.'.$nameAttribute.',url("view", '.$urlParams.')) |raw}}';

