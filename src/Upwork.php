<?php

namespace blackout314\awe;

class Upwork
{
	public function __construct($url, $rss)
	{
		$this->RSS = $rss;
		$this->RSS->load($url);
	}

	public function run()
	{
		foreach($this->RSS->getItems() as $item)
		{
			$link 	= $this->_clean( $item->getLink() );
			$title	= $this->_clean( $item->getTitle() );
			$desc 	= $item->getDescription();

			echo " - ".$title." #".$link."# \n";

			$re = '/Country<\/b>: [A-Za-z\s]+/m';
			preg_match_all($re, $desc, $matches, PREG_SET_ORDER, 0);
			$country = $this->_clean( explode(":",$matches[0][0])[1] );

			$re = '/Posted On<\/b>: [A-Za-z\s0-9,:]+/m';
			preg_match_all($re, $desc, $matches, PREG_SET_ORDER, 0);
			$posted = $this->_clean( explode(": ",$matches[0][0])[1] );

			echo $country.' '.$posted."\n";
		}
	}

	private function _clean($string)
	{
		return trim(preg_replace('/\R+/', " ", $string ));
	}
}
