<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator insolita\giitwig\crud\Generator */

?>

{{ use('yii/widgets/ActiveForm') }}

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">
    {% set form = active_form_begin({
       'id' : '<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-searchform',
       'options' : {'class' : 'form-horizontal'},
       'action ' : 'index',
       'method' : 'get',
    }) %}

<?php
foreach ($generator->getColumnNames() as $attribute) {
    echo "{{ form.field(model, '" . $generator->generateActiveSearchField($attribute) . "') | raw }} \n\n";
}
?>
    <div class="form-group">
        {{html.submitButton( <?= $generator->generateString('Search') ?>,{'class':'btn btn-primary'})}}
        {{html.resetButton( <?= $generator->generateString('Reset') ?>,{'class':'btn btn-default'})}}
    </div>

    {{ active_form_end() }}

</div>
