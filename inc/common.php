<?php

/**
 * some common used stuff, not sorted elsewhere yet.
 */
class Common {

	/**
	 * display error page
	 */
	public function error()
	{
		$content = '<div class="alert alert-error">';
		$content .= '<h1>ERROR: ' . F3::get('ERROR.code') . ' - ' . F3::get('ERROR.title') . '</h1>';
		$content .= F3::get('ERROR.text') . '</div>';
		$content .= '<p>' . F3::get('ERROR.trace') . '</p>'; // does not work... is empty. bug?

		F3::set('content', $content);
		echo Template::serve('layout/default.html');
	}

	/**
	 * setup DB
	 */
	public function install()
	{
		$db = F3::get('DB');

		if(!in_array('pages',$db->getTables())) {
			// install tables
			$db->create('pages',function($table){
				$table->addCol('title','TEXT8');
				$table->addCol('url_path','TEXT8');
				$table->addCol('parent_id','INT8',false,0);
				$table->addCol('config','TEXT16');
				$table->addCol('lang','TEXT8',true,'en');
				$table->addCol('visible_in_menu','BOOLEAN',false,1);
				$table->addCol('sorting','INT16',false,0);
				$table->addCol('hidden','BOOLEAN',false,0);
				$table->addCol('deleted','BOOLEAN',false,0);
			});

			// adding basic data
			F3::set('pages',array(
				array(
					'title' => 'Home',
					'url_path' => 'home',
					'sorting'=> 1,
				),
				array(
					'title' => 'Examples',
					'url_path' => 'examples',
					'sorting' => 2,
				),
				array(
					'title' => 'Documentation',
					'url_path' => 'documentation',
					'sorting' => 3,
				),
				array(
					'title' => 'Plugins',
					'url_path' => 'plugins',
					'sorting' => 4,
				)
			));
			$ax = new Axon('pages');
			var_dump(count(F3::get('pages')));
			for($i = 0; $i<count(F3::get('pages')); $i++) {
				$ax->copyFrom('pages.'.$i);
				$ax->save();
				$ax->reset();
			}
			echo "SUCCESS: pages table created <br>";

		} else {
			echo "pages table already created <br>";

			$ax = new Axon('pages');
			var_export($ax->afind());
		}
	}

}
