<?php

class Page extends SiteTree {

	private static $db = array(
		'Anchor' => 'Boolean'
	);

	private static $has_one = array(
		'Image' => 'Image'
	);

	private static $has_many = array(
		'Images' => 'PageImage',
    'Slider' => 'SliderImage'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$image = FileAttachmentField::create('Image', 'Featured image')
		->setThumbnailHeight(200)
	  ->setThumbnailWidth(200)
	  ->setAutoProcessQueue(true) // do not upload files until user clicks an upload button
	  ->setMaxFilesize(10) // 10 megabytes. Defaults to PHP's upload_max_filesize ini setting
	  ->imagesOnly();

		$gallery = FileAttachmentField::create('Images', 'Upload images')
	  ->setThumbnailHeight(200)
	  ->setThumbnailWidth(200)
	  ->setAutoProcessQueue(true) // do not upload files until user clicks an upload button
	  ->setMaxFilesize(10) // 10 megabytes. Defaults to PHP's upload_max_filesize ini setting
	  ->imagesOnly();
		// ->setPermissions(array(
		//    'delete' => false,
		//    'detach' => function () {
		//      return Member::currentUser() && Member::currentUser()->inGroup('editors');
		//    }
		//  )

    $conf = GridFieldConfig_RelationEditor::create(10);
    $conf->addComponent(new GridFieldSortableRows('Sort'));
    $fields->addFieldToTab('Root.Slider', new GridField('Slider', 'Slider', $this->Slider(), $conf));

	  $fields->addFieldToTab("Root.Images", $image);
	  $fields->addFieldToTab("Root.Images", $gallery);

		return $fields;
	}

	function getSettingsFields() {
    $fields = parent::getSettingsFields();
    $fields->insertAfter(new CheckboxField('Anchor'), "ShowInSearch");
    return $fields;
	}

	public function Sections() {
		$pages = Page::get()->filter("Anchor", 1)->filter("ParentID", 0);
		return $pages;
	}

	public function getPreviewLayout() {
		$templateName = "Preview_" . $this->URLSegment;

    if(!SSViewer::hasTemplate($templateName)) {
    	$templateName = "Preview_" . $this->ClassName;
    }
    $template = array($templateName, 'Preview');
		return $this->renderWith($template);
	}

	public function Link() {
		if(!!$this->Anchor && Controller::curr()->ClassName=='HomePage') {
			return "#" . $this->URLSegment;
		}
		else {
			return parent::Link();
		}
	}

	public function Loop($n) {
		$a = new ArrayList();
		for($i=1;$i<=$n;$i++) {
			$a->push(new ArrayData(array(
				"Title" => "Item " . $i,
				"Pos" => $i
			)));
		}
		return $a;
	}

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array();

	public function init()
  {
      parent::init();
      $themeFolder = $this->ThemeDir();

      $include_final = array();
      $include_list = array(
        '/assets/plugins/jquery-1.11.2.min.js',
        "/assets/plugins/modernizr-2.8.3.js",
        "/assets/plugins/jquery.easing.min.js",
        "/assets/plugins/scrollReveal.min.js",
        "/assets/plugins/numscroller-1.0.js",
        "/assets/plugins/typed.min.js",
        "/assets/plugins/magnific/jquery.magnific-popup.min.js",
        "/assets/plugins/owl-carousel/owl.carousel.min.js",
        // "/assets/plugins/retina.min.js",
        "/assets/plugins/jquery.mb.YTPlayer.js",
        "/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js",
        "/assets/plugins/jquery.simpleparallax.min.js",
        "/assets/plugins/bootstrap/js/bootstrap.min.js",
        "/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js",
        "/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js",
        '/vendor/jquery-smooth-scroll/jquery.smooth-scroll.js'
      );

      foreach($include_list as $include) {
      	$include_final[] = $themeFolder . $include;
      }

      Requirements::combine_files(
        'vendor.js', $include_final
      );

      Requirements::combine_files('scripts.js', array(
        $themeFolder . '/assets/js/main.js',
        $themeFolder . '/scripts/main.min.js'
      ));
  }

	public function Placeholder($width=500, $height=500) {
		return "http://placehold.it/{$width}x{$height}/333333";
	}

}
