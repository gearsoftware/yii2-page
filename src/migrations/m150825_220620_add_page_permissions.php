<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use gearsoftware\db\PermissionsMigration;

class m150825_220620_add_page_permissions extends PermissionsMigration
{

    public function beforeUp()
    {
        $this->addPermissionsGroup('pageManagement', 'Page Management');
    }

    public function afterDown()
    {
        $this->deletePermissionsGroup('pageManagement');
    }

    public function getPermissions()
    {
        return [
            'pageManagement' => [
                'links' => [
                    '/admin/page/*',
                    '/admin/page/default/*',
                ],
                'viewPages' => [
                    'title' => 'View Pages',
                    'roles' => [self::ROLE_PRINCIPAL],
                    'links' => [
                        '/admin/page/default/index',
                        '/admin/page/default/view',
                        '/admin/page/default/grid-sort',
                        '/admin/page/default/grid-page-size',
                    ],
                ],
                'editPages' => [
                    'title' => 'Edit Pages',
                    'roles' => [self::ROLE_PRINCIPAL],
                    'childs' => ['viewPages'],
                    'links' => [
                        '/admin/page/default/update',
                        '/admin/page/default/bulk-activate',
                        '/admin/page/default/bulk-deactivate',
                        '/admin/page/default/toggle-attribute',
                    ],
                ],
                'createPages' => [
                    'title' => 'Create Pages',
                    'roles' => [self::ROLE_PRINCIPAL],
                    'childs' => ['viewPages'],
                    'links' => [
                        '/admin/page/default/create',
                    ],
                ],
                'deletePages' => [
                    'title' => 'Delete Pages',
                    'roles' => [self::ROLE_PRINCIPAL],
                    'childs' => ['viewPages'],
                    'links' => [
                        '/admin/page/default/delete',
                        '/admin/page/default/bulk-delete',
                    ],
                ],
                'fullPageAccess' => [
                    'title' => 'Full Page Access',
                    'roles' => [self::ROLE_PRINCIPAL],
                ],
            ],
        ];
    }

}
