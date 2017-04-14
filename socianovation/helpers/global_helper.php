<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '<li>
		<a href="<?php echo site_url(workflows); ?>"><i class="fa fa-list fa-fw"></i> Workflows</a>
	</li>';
	}
