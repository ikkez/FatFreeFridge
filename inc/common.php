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
        $f3 = \Base::instance();

        $content = '<div class="alert alert-error">';
		$content .= '<h1>ERROR: ' . $f3->get('ERROR.code') . ' - ' . $f3->get('ERROR.title') . '</h1>';
		$content .= $f3->get('ERROR.text') . '</div>';
//		$content .= '<p>' . $f3->get('ERROR.trace') . '</p>';

        $f3->set('content', $content);
        $f3->set('page.title','404');
        $pageModel = new \Page\Model();
        $f3->set('menu',$pageModel->getMainMenuPages());
		echo \Template::instance()->render('layout/default.html');
	}

	/**
	 * setup DB
	 */
	public function install()
	{
        $f3 = \Base::instance();
		$db = $f3->get('DB');
		$builder = new \DB\SQL\Schema($db);
		
		if(!in_array('pages',$builder->getTables())) {
			// install tables
            $builder->createTable('pages');
            $builder->addColumn('title',\DB\SQL\Schema::DT_TEXT8);
            $builder->addColumn('url_path', \DB\SQL\Schema::DT_TEXT8);
            $builder->addColumn('parent_id', \DB\SQL\Schema::DT_INT8,true,0);
            $builder->addColumn('config', \DB\SQL\Schema::DT_TEXT16);
            $builder->addColumn('lang', \DB\SQL\Schema::DT_TEXT8,true,'en');
            $builder->addColumn('visible_in_menu', \DB\SQL\Schema::DT_BOOLEAN,true,1);
            $builder->addColumn('sorting', \DB\SQL\Schema::DT_INT16, true,0);
            $builder->addColumn('hidden', \DB\SQL\Schema::DT_BOOLEAN, true,0);
            $builder->addColumn('deleted', \DB\SQL\Schema::DT_BOOLEAN, true,0);
            unset($builder);

			// adding basic data
			$f3->set('pages',array(
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
			$pages = new \DB\SQL\Mapper($db,'pages');
			for($i = 0; $i<count($f3->get('pages')); $i++) {
				$pages->copyfrom('pages.'.$i);
				$pages->save();
				$pages->reset();
			}
			echo "SUCCESS: pages table created <br>";

		} else {
			echo "pages table already created <br>";
		}
	}

}
