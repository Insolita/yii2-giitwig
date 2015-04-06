Gii Twig -Crud
==============
Gii Twig Template Generator (Port default yii2-gii templates) (Without i18N support yet)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist insolita/yii2-giitwig "*"
```

or add

```
"insolita/yii2-giitwig": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Twig settings

```php
'view'=>[
            'class'=>'yii\web\View',
            'renderers'=>[
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => ['html' => '\yii\helpers\Html','arhelp'=>'\yii\helpers\ArrayHelper','url'=>'yii\helpers\Url'],
                    'uses' => ['yii\bootstrap'],],
            ]

]
```

Gii settings

```php
$config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'generators' => [
            'twigcrud' => [
                'class' => 'insolita\giitwig\crud\Generator', // generator class
                'templates' => [
                    'twigCrud' => '@insolita/giitwig/crud/default',
                ]
            ]
        ],
    ];
```

for customize - copy files from @insolita/giitwig/crud/default to any place, customize and add
```php
$config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'generators' => [
            'twigcrud' => [
                'class' => 'insolita\giitwig\crud\Generator', // generator class
                'templates' => [
                    'twigCrud' => '@insolita/giitwig/crud/default',
                    'twigcustomCrud' => '@your/path/to/crud/customized',
                ]
            ]
        ],
    ];
```