<?php
$menus = '';
foreach($table_list as $tl)
{
	$tablename = $tl['table_name'];
	$menus .= "<li>
		<a href=\"'.site_url('".$tablename."').'\"><i class=\"fa fa-list fa-fw\"></i> ".str_replace("_"," ", ucfirst($tablename))."</a>
	</li>";

}

$string = '<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return \''.$menus.'\';
	}
';



$hasil_view_read = createFile($string, $target."helpers/global_helper.php");

?>