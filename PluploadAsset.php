<?php

namespace davidxu\plupload;

use Yii;
use yii\web\AssetBundle;

/**
 * PluploadAsset
 *
 * @package davidxu\plupload
 * @author David Xu <david.xu.uts@163.com>
 * @since 2.0
 */
class PluploadAsset extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG
    ];
    public $sourcePath = '@davidxu/plupload/assets';

    /**
     * @var array 包含的JS
     */
    public $js = [
        'js/plupload.full.min.js',
        'js/plupload.custom.js',
    ];

    /**
     * @var array 包含的CSS
     */
    public $css = [
        'css/plupload.min.css',
    ];

    /**
     * @var array 定义依赖
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * @var string 使用语言包
     */
    public $language;

    /**
     * @inheritdoc
     */
    public function init() {
        if (!$this->language) {
            $this->language = Yii::$app->language;
        }
        $language = str_replace('-', '_', $this->language);
        $fallbackLanguage = substr($this->language, 0, 2);
        if ($fallbackLanguage !== $this->language && !file_exists(Yii::getAlias($this->sourcePath . "/js/i18n/{$language}.js"))) {
            $language = $fallbackLanguage;
        }
        $this->js[] = "js/i18n/$language.js";
        parent::init();
    }
}
