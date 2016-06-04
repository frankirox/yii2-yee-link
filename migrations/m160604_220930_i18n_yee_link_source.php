<?php

use yeesoft\db\SourceMessagesMigration;

class m160604_220930_i18n_yee_link_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'yee/link';
    }

    public function getMessages()
    {
        return [
            'Redirect' => 1,
            'Redirects' => 1,
            'Status Code' => 1,
        ];
    }
}