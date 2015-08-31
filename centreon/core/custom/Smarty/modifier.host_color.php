<?php
/*
 * Copyright 2015 Centreon (http://www.centreon.com/)
 * 
 * Centreon is a full-fledged industry-strength solution that meets 
 * the needs in IT infrastructure and application monitoring for 
 * service performance.
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *    http://www.apache.org/licenses/LICENSE-2.0  
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 */

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     modifier.host_color.php
 * Type:     modifier
 * Name:     host_color
 * Purpose:  outputs a class name depending on host status
 * -------------------------------------------------------------
 */
function smarty_modifier_host_color($state) {
    switch ($state) {
    case 0:
        $class = "success";
        break;
    case 1:
        $class = "danger";
        break;
    case 2:
        $class = "primary";
        break;
    default:
        $class = "default";
        break;
    }    
    return $class;
}
