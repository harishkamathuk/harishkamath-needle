<?php

class HaystackShell extends AppShell {
	
	public $uses = array('Haystack');
	
	public function main() {
		$this->out('Hello World.');
	}
		
    public function show() {
        $url = $this->Url->findById($this->args[0]);
		$this->out(pr($url, true));
    }

	public function mine() {

	
		// store the id of the Url in local variable
		$id = $this->args[0];

		$this->Haystack->id = $id;
		if (!$this->Haystack->exists()) {
			throw new NotFoundException(__('Invalid haystack'));
		}
		
		$haystack = $this->Haystack->findById($id); 
		$haystack_data = $haystack['Haystack']['haystack'];
		
		$needle = $this->Haystack->Url->Needle->findById($haystack['Url']['needle_id']);
		$start = $needle['Needle']['needle_start'];
		$end = $needle['Needle']['needle_end'];
		
		$needle = $this->Haystack->mine($haystack_data, $start, $end); // TODO: process return value
		
		$this->Haystack->create();
		$this->Haystack->save(array( 'id' => $id, 'needle_found' => $needle)); 
		
		$this->out(pr("Needle Found - $needle", true));
		$this->out(pr('Needle Found - '. iconv("UTF-8", "ASCII//IGNORE//TRANSLIT", $needle)));
				
	}// end of fetch method	
	
}
?>