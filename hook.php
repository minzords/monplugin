<?php
/**
 * ---------------------------------------------------------------------
 * ITSM-NG
 * Copyright (C) 2023 ITSM-NG and contributors.
 *
 * https://www.itsm-ng.org
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of ITSM-NG.
 *
 * ITSM-NG is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * ITSM-NG is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ITSM-NG. If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
 **/

 /**
 * Display information on login page
 *
 * @return void
 */
function myplugin_display_login (): void {
    die("Hello World!");
    echo "That line will appear on the login page!";
 }

 function plugin_myplugin_redefine_menus($menu): Array{
    $menu['monplugin'] = [
        'title'     => __('My plugin', 'myplugin'),
        'page'   => '/plugins/monplugin/front/config.form.php',
        'links' => ['search' => '/front/dashboard_assets.php'],
        // Si menu deroulant (false sinon true)
        'content'   => [true],
    ];

    return $menu;
}
 
function plugin_monplugin_install(): bool {
    global $DB;

    // New Migration
    $migration = new Migration(101);

    
    // Create table in database
    if (!$DB->tableExists("itsm_monplugin")) {
        $query = "CREATE TABLE `itsm_monplugin` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `comment` text NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $DB->query($query) or die("Error creating table itsm_monplugin");
    }

    return true ;
}

/**
 * Uninstall plugin
 *
 * @return boolean
 */
function plugin_monplugin_uninstall(): bool {
    global $DB;

    // Delete table in database
    $tables = array("itsm_monplugin");

    foreach($tables as $table) {
        $DB->query("DROP TABLE IF EXISTS `$table`;");
    }

    return true;
}