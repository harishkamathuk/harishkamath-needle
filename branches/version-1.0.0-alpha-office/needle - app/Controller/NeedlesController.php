<?php
App::uses('AppController', 'Controller');
/**
 * Needles Controller
 *
 * @property Needle $Needle
 * @property PaginatorComponent $Paginator
 */
class NeedlesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Needle->recursive = 0;
		$this->set('needles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Needle->exists($id)) {
			throw new NotFoundException(__('Invalid needle'));
		}
		$options = array('conditions' => array('Needle.' . $this->Needle->primaryKey => $id));
		$this->set('needle', $this->Needle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Needle->create();
			if ($this->Needle->save($this->request->data)) {
				$this->Session->setFlash(__('The needle has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The needle could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Needle->exists($id)) {
			throw new NotFoundException(__('Invalid needle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Needle->save($this->request->data)) {
				$this->Session->setFlash(__('The needle has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The needle could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Needle.' . $this->Needle->primaryKey => $id));
			$this->request->data = $this->Needle->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Needle->id = $id;
		if (!$this->Needle->exists()) {
			throw new NotFoundException(__('Invalid needle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Needle->delete()) {
			$this->Session->setFlash(__('The needle has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The needle could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
