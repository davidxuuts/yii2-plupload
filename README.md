# Yii2 Plupload Widget

yii2-plupload is a widget based plupload solution for Yii2. It is released under the BSD 3-Clause license.

[![Latest Stable Version](https://poser.pugx.org/davidxu/yii2-plupload/v/stable.png)](https://packagist.org/packages/davidxu/yii2-plupload)
[![Total Downloads](https://poser.pugx.org/davidxu/yii2-plupload/downloads.png)](https://packagist.org/packages/davidxu/yii2-plupload)
[![License](https://poser.pugx.org/davidxu/yii2-plupload/license.png)](https://packagist.org/packages/davidxu/yii2-plupload)


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist davidxuuts/yii2-plupload "*"
```

or add

```json
davidxuuts/yii2-plupload *
```

to the require section of your composer.json.

## Usage

To use this widget, you have to add the code in your viewer page:

Usage With ActiveForm and model

```
use davidxu\plupload\Plupload;

echo $form->field($model, 'thumb')->widget(Plupload::classname(), [
    'url' => ['upload'],
    //'wrapperOptions' => ['width' => 200, 'height' => 200],
    //'resize' => ['width' => 200, 'height' => 200],
    'autoUpload' => true,
    'options' => [
        'filters' => [
            'mime_types' => [
                [
                    'title' => "Image files",
                    'extensions' => "jpg,gif,png"
                ],
            ]
        ],
    ],
]);
```

Usage Without ActiveForm model

```
use davidxu\plupload\Plupload;

Plupload::widget([
    'url' => ['upload'],
    'browseLabel' => '上传文件',
    'autoUpload' => true,
    'errorContainer' => 'errorUpload',
    'options' => [
        'filters' => [
            'max_file_size' => '20kb',
            'mime_types' => [
                [
                    'title' => "Image files",
                    'extensions' => "jpg,gif,png"
                ],
            ]
        ],
    ],
    'events' => [],
]);
```

Usage actions with PluploadAction

```php
public function actions()
{
    return [
	...
        'plupload' => [
	    'class' => 'davidxu\plupload\PluploadAction',
	    'onComplete' => function($file, $params) {
	        //On Complete
		    ...
	        return [
	            'file' => $file,
	            'params' => $params
	        ];
	    },
	    ],
	...
    ];
}
```


## License

**yii2-plupload** is released under the `Apache 2.0` License. See the bundled `LICENSE.md` for details.


## Plupload

Copyright 2002, [David XU](https://davidxuuts.github.com/)  
Released under [GPLv2 License](https://github.com/moxiecode/plupload/blob/master/license.txt)