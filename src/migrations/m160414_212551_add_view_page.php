<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use yii\db\Migration;

class m160414_212551_add_view_page extends Migration
{
    const PAGE_TABLE = '{{%page}}';
    
    public function safeUp()
    {
        $this->addColumn(self::PAGE_TABLE, 'view', $this->string(255)->notNull()->defaultValue('page'));
        $this->addColumn(self::PAGE_TABLE, 'layout', $this->string(255)->notNull()->defaultValue('main'));
    }

    public function safeDown()
    {
        $this->dropColumn(self::PAGE_TABLE, 'view');
        $this->dropColumn(self::PAGE_TABLE, 'layout');
    }
}