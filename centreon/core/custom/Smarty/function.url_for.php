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
 * File:     function.url_for.php
 * Type:     function
 * Name:     url_for
 * Purpose:  returns url with complete parameters
 * -------------------------------------------------------------
 */
function smarty_function_url_for($params) {
    if (isset($params['url'])) {
        $routeParams = array();
        if (isset($params['params']) && is_array($params['params'])) {
            $routeParams = $params['params'];
        }
        $finalRoute = \Centreon\Internal\Di::getDefault()
            ->get('router')
            ->getPathFor($params['url'], $routeParams);
    }
    return str_replace("//", "/", $finalRoute);
}
