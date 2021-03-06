<?php
/**
 * @author Nurbek Nurjanov <nurbek.nurjanov@mail.ru>
 * @link http://sakuracommerce.com/
 * @copyright Copyright (c) 2018 Sakuracommerce
 * @license http://sakuracommerce.com/license/
 */

namespace favorite\assets;

use yii\helpers\Url;
use yii\web\AssetBundle;
use Yii;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FavoriteAsset extends AssetBundle
{
    public $sourcePath = '@favorite/asset_source';

    public $js = [
        'js/favorite.js',
    ];
    public $css = [
        'css/favorite.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public static function register($view)
    {
        $addFavorite = Yii::t('favorite', 'Add to favorites');
        $removeFavorite = Yii::t('favorite', 'Remove from favorites');




        $view->registerJs("
            $('body').on('click', '.addToFavorite, .removeFromFavorite',function(e){
                if($(this).attr('title')=='$addFavorite')
                    $(this).attr('title', '$removeFavorite');
                else if($(this).attr('title')=='$removeFavorite')
                    $(this).attr('title', '$addFavorite');
            });
        ", $view::POS_READY, 'favorite');

        return parent::register($view);
    }
}
