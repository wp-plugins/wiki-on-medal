<?php

class wikiLeechMedal {
	private $data2;
	private $start;
	private $end;
	
	public function __construct($url) {
		$data = file_get_contents($url);
		$data = strip_tags($data, '<ul>, <li>'); //wywala ca³y html
		$this->data2 = trim(preg_replace('/\s+/', ' ', $data)); //usuwa wszystkie, niepotrzebne przerwy, entery itp.
	}
	
	public function showWikiMedal($start, $end) {
		$data = $this->data2;
		$matches = array();
    	$pattern = "/$start(.*?)$end/";
    	if (preg_match($pattern, $data, $matches)) {
			echo "<div class=\"wikimedal\">" . $matches[1] . "</div>";
		}
	}
}