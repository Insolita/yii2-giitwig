<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator insolita\giitwig\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

?>

<?= $generator->indexWidgetType === 'grid' ? "{{ use('yii/grid/GridView') }}":"{{ use('yii/widgets/ListView') }}"?>
{{ set(this,'title',<?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>) }}
{{ set(this, 'params', { 'breadcrumbs' : { '' : this.title } }) }}

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <h1>{{this.title}}</h1>
<?php if(!empty($generator->searchModelClass)): ?>
   {# {{ this.render('_search.twig',{'model':searchModel})|raw }} #}
<?php endif; ?>

    <p>
        <a href="{{ path(['create']) }}" class="btn btn-success"><?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?></a>
    </p>

<?php if ($generator->indexWidgetType === 'grid'): ?>
    {{ grid_view_widget({
    'dataProvider': dataProvider,
    <?= !empty($generator->searchModelClass) ?"'filterModel': searchModel,":""?>
    'columns': [
         {'class': 'yii\\grid\\SerialColumn'},
    <?php
    $count = 0;
    if (($tableSchema = $generator->getTableSchema()) === false) {
        foreach ($generator->getColumnNames() as $name) {
            if (++$count < 6) {
                echo "   {'attribute' : '" . $name . "'},\n";
            } else {
                echo "   {'attribute' : '" . $name . "'},\n";
            }
        }
    } else {
        foreach ($tableSchema->columns as $column) {
            $format = $generator->generateColumnFormat($column);
            if (++$count < 6) {
                echo "   {'attribute' : '" . $column->name . "' ".($format === 'text' ? "" : ",'format':'".$format."'")."},\n";
            } else {
                echo "   {'attribute' : '" . $column->name . "' ".($format === 'text' ? "" : ",'format':'".$format."'")."},\n";
            }
        }
    }
    ?>
        {'class': 'yii\\grid\\ActionColumn'},
      ],
      })
    }}

<?php else: ?>
    {{ list_view_widget({
        'dataProvider': dataProvider,
        'itemOptions':{'class':'item'},
        'itemView':'_listviewitems.twig'
        })
    }}
<?php endif; ?>

</div>
