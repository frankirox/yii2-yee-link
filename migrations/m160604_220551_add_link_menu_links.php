<?php

use yii\db\Migration;

class m160604_220551_add_link_menu_links extends Migration
{

    public function up()
    {
        $this->insert('{{%menu_link}}', ['id' => 'settings-redirects', 'menu_id' => 'admin-menu', 'link' => '/link/default/index', 'parent_id' => 'settings', 'created_by' => 1, 'order' => 5]);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'settings-redirects', 'label' => 'Redirects', 'language' => 'en-US']);
    }

    public function down()
    {
        $this->delete('{{%menu_link}}', ['like', 'id', 'settings-redirects']);
    }
}