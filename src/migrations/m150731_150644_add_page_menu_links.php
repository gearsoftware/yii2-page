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

class m150731_150644_add_page_menu_links extends Migration
{

    public function up()
    {
        $this->insert('{{%menu_link}}', ['id' => 'page', 'menu_id' => 'admin-menu', 'link' => '/page/default/index', 'image' => 'demo-psi-file-html', 'created_by' => 1, 'order' => 2]);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'page', 'label' => 'Pages', 'language' => 'en-US']);
    }

    public function down()
    {
        $this->delete('{{%menu_link}}', ['like', 'id', 'page']);
    }
}