<?php

namespace Unflr;

use Config, Input, Redirect, Session;

class PageController extends \Yeb\Laravel\PageController 
{	

	public function __construct()
	{
		$this->appAlias = 'unflare';
		parent::__construct();
	}

// overrides
// ---------------------------------------------------------------------
	protected function setHead()
	{
		$this->head = array_merge($this->head, [
			'title'       => 'Unflare' . ($this->title ? ' - '.$this->title : null),
			'description' => Config::get('unflare.marketing.description'),
			'keywords'    => Config::get('unflare.marketing.keywords'),
 		]);
	}

	protected function setLocale()
	{
		$this->locale = 'en';
		
		Config::set('locale', $this->locale);
		
		defined('TESTING') or $GLOBALS['translate']->setLocale($this->locale);

		$this->head['lang']     = $this->locale;
		$this->jsVars['locale'] = $this->locale;
	}

}
