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

 define('MONPLUGIN_VERSION', '0.1.0');
 define('MONPLUGIN_AUTHOR', 'Minzord');
 define('MONPLUGIN_HOMEPAGE', 'https://github.com/Minzords');


/**
 * Define Name,Version,Author... of the plugin
 *
 * @return void
 */
function plugin_version_monplugin(): array {
    return array(
        'name'           => "monplugin",
        'version'        => MONPLUGIN_VERSION,
        'author'         => MONPLUGIN_AUTHOR,
        'license'        => 'GPLv3+',
        'homepage'       => MONPLUGIN_HOMEPAGE,
        'requirements'   => [
            'glpi'   => [
               'min' => '9.5'
            ],
            'php'    => [
                'min' => '8.0'
            ]
         ]
    );
}

/**
 * Check prerequisites before install
 *
 * @return boolean
 */
function plugin_monplugin_check_prerequisites(): bool {
    if (version_compare(ITSM_VERSION, '1.0', 'lt')) {
        echo "This plugin requires ITSM >= 1.0";
        return false;
    }
    return true;
}

/**
 * Check configuration
 *
 * @return boolean
 */
function plugin_monplugin_check_config(): bool {
    return true;
}

/**
 * Function called at plugin activation
 * This function is used to register class
 * 
 * @global array $PLUGIN_HOOKS
 */
function plugin_init_monplugin(): void {
    global $PLUGIN_HOOKS;
    // Declaration des HOOKS
    $PLUGIN_HOOKS['csrf_compliant']['monplugin'] = true;
    // $PLUGIN_HOOKS['hook_name']['plugin_name'] = 'function_name';
    
    // $PLUGIN_HOOKS['display_login']['monplugin'] = 'myplugin_display_login';

    // if (Session::haveRight("config", UPDATE)) {
    //      $PLUGIN_HOOKS['config_page']['monplugin'] = 'front/config.form.php';
    // }

    // $PLUGIN_HOOKS['redefine_menus']['monplugin'] = 'plugin_myplugin_redefine_menus';
}