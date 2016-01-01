<?php

class ProjectPage extends Page {

  public function _getProjects() {
    return Project::get();
  }

}

class ProjectPage_Controller extends Page_Controller {

  private static $allowed_actions = array(
    'view',
  );

  private static $url_handlers = array(
    '' => 'index',
    '$URLSegment!' => 'view'
  );

  //
  // Route functions
  //

  public function index() {
    return array();
  }

  public function view()
  {
    if($Item = $this->getCurrentItem()) {
      $Data = array(
        'Title' => $Item->Title,
        'Content' => $Item->Content,
        'MetaTitle' => $Item->Title,
        'Item' => $Item,
        'Image' => $Item->Image(),
        'ExtraClasses' => 'ProjectSingle'
        // 'ThumbnailURL' => $Item->getThumbnail() ? $Item->getThumbnail()->URL : false,
        // 'AbsoluteLink' =>$Item->AbsoluteLink()
      );
      return $this->customise($Data)->renderWith(array( 'ProjectPage_single','Page' ));
    }
      else {
      return $this->httpError(404, _t("Projects.NOTFOUND","Project not found."));
    }
  }

  public function _getProjects($p = 12) {
    return Project::get();
  }

  public function _getCurrentItem() {
    $URLSegment = $this->request->param("URLSegment");
    $Item = DataObject::get_one('Project', "URLSegment = '$URLSegment'");
    if($URLSegment && $Item) {
      return $Item;
    }
  }

  public function NextPageLink() {
    return $this->Link( "?p/" . ($this->currentPage + 1));

  }

  public function PrevPageLink() {
    if($this->currentPage == 2) {
      return $this->Link();
    }
    return $this->Link( "?p/" . ($this->currentPage - 1));
  }

  // TODO: Aggregated articles
  public function _AggregatedProjects() {
    // $filter = "";

    // // Filter for local vs national blog
    // if(!$s = Subsite::currentSubsiteId()) {
    //   $filter .= "(Featured=1 OR SubsiteID=0)";
    // }
    // else{
    //   $filter .= "(SubsiteID=$s OR (SubsiteID=0 AND Circulate=1))";
    // }

    // // Category filter
    // if($category = $this->request->param('Action')=='category') {
    //   $category = $this->_getCurrentCategory();
    //   $filter .= " AND BlogCategoryID = $category->ID";
    // }

    return Project::get(); //->where($filter);

  }

  function p() {
    return array();
  }

  /**
   * Returns a list of breadcrumbs for the current page.
   *
   * @param int $maxDepth The maximum depth to traverse.
   * @param boolean|string $stopAtPageType ClassName of a page to stop the upwards traversal.
   * @param boolean $showHidden Include pages marked with the attribute ShowInMenus = 0
   *
   * @return ArrayList
  */
  public function getBreadcrumbItems($maxDepth = 20, $stopAtPageType = false, $showHidden = false) {
    $page = $this;
    $pages = array();

    while(
      $page
      && (!$maxDepth || count($pages) < $maxDepth)
      && (!$stopAtPageType || $page->ClassName != $stopAtPageType)
    ) {
      if($showHidden || $page->ShowInMenus || ($page->ID == $this->ID)) {
        $pages[] = $page;
      }
      $page = $page->Parent;
    }
    if($item = $this->getCurrentItem()) {
      $extraPage = new Page_Controller();
      $extraPage->MenuTitle = $item->Title;

      $thisPage = new ProjectPage_Controller();
      $thisPage->MenuTitle = self::$Title;
      $thisPage->URLSegment = self::$URLPrefix;

      $pages[count($pages)-1] = $extraPage;
      $pages[] = $thisPage;
    }

    return new ArrayList(array_reverse($pages));
  }

  // Override required to work with extended breadcrumbs
  public function Link($action=NULL) {
    return Controller::join_links(self::$URLPrefix, $action);
  }

  /**
   * Return a breadcrumb trail to this page. Excludes "hidden" pages (with ShowInMenus=0) by default.
   *
   * @param int $maxDepth The maximum depth to traverse.
   * @param boolean $unlinked Whether to link page titles.
   * @param boolean|string $stopAtPageType ClassName of a page to stop the upwards traversal.
   * @param boolean $showHidden Include pages marked with the attribute ShowInMenus = 0
   * @return HTMLText The breadcrumb trail.
   */
  public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false) {
    $pages = $this->getBreadcrumbItems($maxDepth, $stopAtPageType, $showHidden);
    $template = new SSViewer('BreadcrumbsTemplate');
    return $template->process($this->customise(new ArrayData(array(
      "Pages" => $pages,
      "Unlinked" => $unlinked
    ))));
  }

  public function getMenuTitle() {
    if($item = $this->getCurrentItem()) {
      return $item->Title;
    }
    else {
      return 'Articles';
    }
  }

  public function FeaturedArticle($n=1) {
    $p = DataObject::get("Article","Featured=1 AND Published=1","Created DESC","",$n);
    if($p) {
      return $p;
    }
  }

  public function SiblingArticles() {
    if($item = $this->getCurrentItem()) {
      $a = $this->Articles()->where("Published = 1 AND ID != ".$item->ID);
      if($a) {
        return $a->limit(5);
      }
    }
  }

}
