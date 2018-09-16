<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use gearsoftware\db\SourceMessagesMigration;

class m151121_233615_i18n_core_page_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'core/page';
    }

    public function getMessages()
    {
        return [
            'Page' => 1,
            'Pages' => 1,
            'Create Page' => 1,
        ];
    }
}