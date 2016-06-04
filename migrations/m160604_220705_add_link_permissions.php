<?php

use yeesoft\db\PermissionsMigration;

class m160604_220705_add_link_permissions extends PermissionsMigration
{

    public function beforeUp()
    {
        $this->addPermissionsGroup('linkManagement', 'Link Management');
    }

    public function afterDown()
    {
        $this->deletePermissionsGroup('linkManagement');
    }

    public function getPermissions()
    {
        return [
            'linkManagement' => [
                'links' => [
                    '/admin/link/*',
                    '/admin/link/default/*',
                ],
                'viewLinks' => [
                    'title' => 'View Links',
                    'roles' => [self::ROLE_ADMIN],
                    'links' => [
                        '/admin/link/default/index',
                        '/admin/link/default/grid-sort',
                        '/admin/link/default/grid-page-size',
                    ],
                ],
                'editLinks' => [
                    'title' => 'Edit Links',
                    'roles' => [self::ROLE_ADMIN],
                    'childs' => ['viewLinks'],
                    'links' => [
                        '/admin/link/default/update',
                    ],
                ],
                'createLinks' => [
                    'title' => 'Create Links',
                    'roles' => [self::ROLE_ADMIN],
                    'childs' => ['viewLinks'],
                    'links' => [
                        '/admin/link/default/create',
                    ],
                ],
                'deleteLinks' => [
                    'title' => 'Delete Links',
                    'roles' => [self::ROLE_ADMIN],
                    'childs' => ['viewLinks'],
                    'links' => [
                        '/admin/link/default/delete',
                        '/admin/link/default/bulk-delete',
                    ],
                ],
                'fullLinkAccess' => [
                    'title' => 'Full Link Access',
                    'roles' => [self::ROLE_ADMIN],
                ],
            ],
        ];
    }

}
