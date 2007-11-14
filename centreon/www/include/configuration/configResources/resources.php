<?php
/**
Oreon is developped with GPL Licence 2.0 :
http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
Developped by : Julien Mathis - Romain Le Merlus

The Software is provided to you AS IS and WITH ALL FAULTS.
OREON makes no representation and gives no warranty whatsoever,
whether express or implied, and without limitation, with regard to the quality,
safety, contents, performance, merchantability, non-infringement or suitability for
any particular or intended purpose of the Software found on the OREON web site.
In no event will OREON be liable for any direct, indirect, punitive, special,
incidental or consequential damages however they may arise and even if OREON has
been previously advised of the possibility of such damages.

For information : contact@oreon-project.org
*/
	if (!isset ($oreon))
		exit ();
	
	isset($_GET["resource_id"]) ? $resourceG = $_GET["resource_id"] : $resourceG = NULL;
	isset($_POST["resource_id"]) ? $resourceP = $_POST["resource_id"] : $resourceP = NULL;
	$resourceG ? $resource_id = $resourceG : $resource_id = $resourceP;

	isset($_GET["select"]) ? $cG = $_GET["select"] : $cG = NULL;
	isset($_POST["select"]) ? $cP = $_POST["select"] : $cP = NULL;
	$cG ? $select = $cG : $select = $cP;

	isset($_GET["dupNbr"]) ? $cG = $_GET["dupNbr"] : $cG = NULL;
	isset($_POST["dupNbr"]) ? $cP = $_POST["dupNbr"] : $cP = NULL;
	$cG ? $dupNbr = $cG : $dupNbr = $cP;
		
	#Pear library
	require_once "HTML/QuickForm.php";
	require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';
	
	#Path to the configuration dir
	$path = "./include/configuration/configResources/";
	
	#PHP functions
	require_once $path."DB-Func.php";
	require_once "./include/common/common-Func.php";

	switch ($o)	{
		case "a" : require_once($path."formResources.php"); break; #Add a Resource
		case "w" : require_once($path."formResources.php"); break; #Watch a Resource
		case "c" : require_once($path."formResources.php"); break; #Modify a Resource
		case "s" : enableResourceInDB($resource_id); require_once($path."listResources.php"); break; #Activate a Resource
		case "u" : disableResourceInDB($resource_id); require_once($path."listResources.php"); break; #Desactivate a Resource
		case "m" : multipleResourceInDB(isset($select) ? $select : array(), $dupNbr); require_once($path."listResources.php"); break; #Duplicate n Resources
		case "d" : deleteResourceInDB(isset($select) ? $select : array()); require_once($path."listResources.php"); break; #Delete n Resources
		default : require_once($path."listResources.php"); break;
	}
?>