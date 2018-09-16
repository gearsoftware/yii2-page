<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

namespace gearsoftware\page;

use Yii;

/**
 * Page Module For Yii2
 *
 * @author José Peña <joepa37@gmail.com>
 */
class PageModule extends \yii\base\Module
{
    /**
     * Version number of the module.
     */
    const VERSION = '0.1.0';

    public $controllerNamespace = 'gearsoftware\page\controllers';
    public $viewList;
    public $layoutList;

    /**
     * Default views and layouts
     * Add more views and layouts in your main config file by calling the module
     *
     *   Example:
     *
     *   'page' => [
     *       'class' => 'gearsoftware\page\PageModule',
     *       'viewList' => [
     *           'page' => 'View Label 1',
     *           'page_test' => 'View Label 2',
     *       ],
     *       'layoutList' => [
     *           'main' => 'Layout Label 1',
     *           'dark_layout' => 'Layout Label 2',
     *       ],
     *   ],
     */
    public function init()
    {
        if (empty($this->viewList)) {
            $this->viewList = [
                'page' => Yii::t('core', 'Page view')
            ];
        }

        if (empty($this->layoutList)) {
            $this->layoutList = [
                'main' => Yii::t('core', 'Main layout')
            ];
        }

        parent::init();
    }
}