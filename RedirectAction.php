<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yeesoft\link;

use Yii;
use yii\base\Action;
use yeesoft\link\models\Link;

/**
 * RedirectAction redirects users using link settings.
 *
 * To use RedirectAction, you need to declare an action of RedirectAction
 * type in the `actions()` method of your `SiteController`
 * class (or whatever controller you prefer), like the following:
 *
 * ```php
 * public function actions()
 * {
 *     return [
 *         'redirect' => ['class' => 'yeesoft\link\ErrorAction'],
 *     ];
 * }
 * ```
 * 
 * After that you need to add rules:
 * 
 * ```php
 * 'rules' => [
 *     '<action:(redirect)>/<slug:[\w \-]+>' => 'site/redirect',
 * ],
 * 'nonMultilingualUrls' => [
 *     'redirect/index'
 * ],
 * ```
 */
class RedirectAction extends Action
{

    /**
     * Default redirect status code.
     * 
     * @var integer 
     */
    public $defaultStatusCode = 302;

    /**
     * Runs the action
     *
     * @return string result content
     */
    public function run($slug)
    {
        if ($link = Link::findOne(['slug' => $slug])) {
            $statusCode = (empty($link->status_code)) ? $this->defaultStatusCode : $link->status_code;
            return Yii::$app->getResponse()->redirect($link->url, $statusCode);
        } else {
            throw new \yii\web\NotFoundHttpException('Page not found.');
        }
    }

}
