<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '<li>
		<a href="'.site_url('clients').'"><i class="fa fa-list fa-fw"></i> Clients</a>
	</li><li>
		<a href="'.site_url('home_sliders').'"><i class="fa fa-list fa-fw"></i> Home sliders</a>
	</li><li>
		<a href="'.site_url('our_values').'"><i class="fa fa-list fa-fw"></i> Our values</a>
	</li><li>
		<a href="'.site_url('our_works').'"><i class="fa fa-list fa-fw"></i> Our works</a>
	</li><li>
		<a href="'.site_url('workflows').'"><i class="fa fa-list fa-fw"></i> Workflows</a>
	</li>';
	}
