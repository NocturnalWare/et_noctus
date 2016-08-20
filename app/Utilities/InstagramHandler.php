<?php

namespace App\Utilities;

class InstagramHandler
{
	public $images;
	public $ig;
	public $resp1;

	public function __construct(){
		$this->ig = $this->getIG();
		$this->images = $this->buildImageSets();
	}

	//Returns an Instagram Object
	private function getIG(){
		$ig = \Instagram::users()->getMedia('self');
		return $ig->get();
	}

	//Builds an array of the last 20 IG posts 4 at a time
	//Important for desktop view
	private function buildImageSets(){
		$resp1 = [];
		$resp2 = [];
		$resp3 = [];
		$resp4 = [];
		$resp5 = [];
		$arra = 1;
		$count = 0;
		foreach($this->ig as $ins){
			if($count == 4){
				$arra += 1;
				$count = 0;
			}
			${'resp'.$arra} = array_merge(${'resp'.$arra}, [$ins]);
			$count += 1;
		}
		
		$this->resp1 = $resp1;

		return [$resp2, $resp3, $resp4, $resp5];
	}
}
