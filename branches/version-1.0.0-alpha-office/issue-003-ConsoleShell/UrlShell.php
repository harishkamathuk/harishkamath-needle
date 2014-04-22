<?php

class UrlShell extends AppShell {
	
	public $uses = array('Url');
	
	public function main() {
		$this->out('Hello World.');
	}
		
    public function show() {
        $url = $this->Url->findById($this->args[0]);
		$this->out(pr($url, true));
    }

	public function fetch() {

	
		// store the id of the Url in local variable
		$id = $this->args[0];
		
		// retrieve the URL details for id provided
		$url = $this->Url->findById($id);
		
		if (!$url) {
			throw new NotFoundException(__('Invalid url'));
		}
		
		// retrieve body of reponse
		$haystack = $this->Url->fetch($url['Url']['url']); 
		
		// create an instance of Haystack
		$this->Url->Haystack->create();
		
		// build array with the information for Haystack
		$haystack = array(
			'url_id' => $id,
			'haystack' => $haystack,
			'created_by' => 'harish', // TODO: Made it default to current user in DB	
			'modified_by' => 'harish' // TODO: Made it default to current user in DB
		);
		
		// save the Haystack object
		$this->Url->Haystack->save($haystack);
		
		$this->out(pr($haystack, true));
		
	}// end of fetch method	
	
}
?>