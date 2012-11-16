<?php

/**
 * some sort of main controller
 */
class Main {

	public function install() {
		$db = F3::get('DB');
		if(!in_array('pages',$db->getTables())) {

			// install tables
			$db->create('pages',function($table){
				$table->addCol('title','TEXT8');
				$table->addCol('url_path','TEXT8');
				$table->addCol('parent_id','INT8',false,0);
				$table->addCol('lang','TEXT8',true,'en');
				$table->addCol('visible_in_menu','BOOLEAN',false,1);
				$table->addCol('hidden','BOOLEAN',false,0);
				$table->addCol('deleted','BOOLEAN',false,0);
			});

			// adding basic data
			F3::set('pages',array(
				array(
					'title' => 'Home',
					'url_path' => 'home',
				),
				array(
					'title' => 'Examples',
					'url_path' => 'examples',
				),
				array(
					'title' => 'Documentation',
					'url_path' => 'documentation',
				),
				array(
					'title' => 'Plugins',
					'url_path' => 'plugins',
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
