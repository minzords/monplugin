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

class PluginMonpluginConfig extends CommonDBTM {
    /**
     * GetData function
     *
     * @global type $DB
     * @return void
     */
    function getdata(){
        global $DB;
        $query = "SELECT * FROM `glpi_itsm_monplugin`";
        $result = $DB->query($query);
        $data = array();
        while ($row = $DB->fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    function setConfiguration($id=null,$valeur){
        global $DB;
        
        if($id != null) {
            if($valeur != "delStatut"){
                $query = "UPDATE glpi_plugin_monplugin_config SET statut='$valeur' WHERE id='$id'";
            } else {
                $query = "UPDATE glpi_plugin_monplugin_config SET vie='0' WHERE id='$id'";
            }
            $DB->query($query) or die($DB->error());
        } else {
            $query = "INSERT INTO glpi_plugin_monplugin_config (statut,vie) VALUES ('$valeur','1')";
            $DB->query($query) or die($DB->error());
        }
    }
}