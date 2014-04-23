<?php
App::uses('AppController', 'Controller');
/**
 * Haystacks Controller
 *
 * @property Haystack $Haystack
 * @property PaginatorComponent $Paginator
 */
class HaystacksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * Helpers
 *
 * @var array
 */
public $helpers = array('Text');
		
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Haystack->recursive = 0;
		$this->set('haystacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Haystack->exists($id)) {
			throw new NotFoundException(__('Invalid haystack'));
		}
		$options = array('conditions' => array('Haystack.' . $this->Haystack->primaryKey => $id));
		$this->set('haystack', $this->Haystack->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Haystack->create();
			if ($this->Haystack->save($this->request->data)) {
				$this->Session->setFlash(__('The haystack has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The haystack could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$urls = $this->Haystack->Url->find('list');
		$this->set(compact('urls'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Haystack->exists($id)) {
			throw new NotFoundException(__('Invalid haystack'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Haystack->save($this->request->data)) {
				$this->Session->setFlash(__('The haystack has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The haystack could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Haystack.' . $this->Haystack->primaryKey => $id));
			$this->request->data = $this->Haystack->find('first', $options);
		}
		$urls = $this->Haystack->Url->find('list');
		$this->set(compact('urls'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Haystack->id = $id;
		if (!$this->Haystack->exists()) {
			throw new NotFoundException(__('Invalid haystack'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Haystack->delete()) {
			$this->Session->setFlash(__('The haystack has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The haystack could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * mine method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function mine ($id = null, $redirect = true) {
	
		// No view for this method of the Controller
		$this->autoRender = false;

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
		if ($this->Haystack->save(array( 'id' => $id, 'needle_found' => $needle))) {
			$this->Session->setFlash(__('The needle has been updated for the haystack.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The needle could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		
		if($redirect) { // Invoked via GUI, redirect user to view details of Haystack
			return $this->redirect(
				array(
					'controller' => 'haystacks',
					'action' => 'view',
					$id // ID value for the haystack just inserted in the DB
				)
			);
		} // end of redirect check
	} // end of process function
}
