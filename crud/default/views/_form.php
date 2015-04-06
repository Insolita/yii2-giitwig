<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator insolita\giitwig\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

?>

{{ use('yii/widgets/ActiveForm') }}

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
    {% set form = active_form_begin({
           'id' : '<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form',
           'options' : {'class' : 'form-horizontal'},
    }) %}

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "{{ form.field(model, '" . $generator->generateActiveField($attribute) . "') | raw }} \n\n";
    }
} ?>
    <div class="form-group">
        {% if model.isNewRecord %}
           {{html.submitButton( <?= $generator->generateString('Create') ?>,{'class':'btn btn-success'})}}
        {% else %}
           {{html.submitButton( <?= $generator->generateString('Update') ?>,{'class':'btn btn-primary'})}}
        {% endif %}
    </div>

    {{ active_form_end() }}

</div>
