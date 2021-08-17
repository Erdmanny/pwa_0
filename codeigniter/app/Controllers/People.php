<?php

namespace App\Controllers;

use App\Models\PeopleModel;
use CodeIgniter\HTTP\ResponseInterface;

class People extends BaseController
{
    private $_peopleModel, $_session;

    public function __construct()
    {
        $this->_peopleModel = new PeopleModel();
        $this->_session = \Config\Services::session();
    }

    public function index(): string
    {
        $data['people'] = $this->_peopleModel->getPeople();
        return view('people', $data);
    }

    public function addPerson(): string
    {
        return view('addPerson');
    }

    public function addPerson_Validation()
    {
        helper(['form', 'url']);

        $error = $this->validate([
            'new-prename' => 'required',
            'new-surname' => 'required',
            'new-street' => 'required',
            'new-zip' => 'required|min_length[5]|max_length[5]|numeric',
            'new-city' => 'required'
        ],
        [
            'new-prename' => [
                'required' => 'A prename is required.'
            ],
            'new-surname' => [
                'required' => 'A surname is required.'
            ],
            'new-streetname' => [
                'required' => 'A street is required.'
            ],
            'new-zip' => [
                'required' => 'A zip is required.',
                'min_length' => 'Zip must be of length 5.',
                'max_length' => 'Zip must be of length 5.',
                'numeric' => 'Zip can only consist of numbers.'
            ],
            'new-city' => [
                'required' => 'A city is required.'
            ],
        ]);

        if (!$error) {
            return view('addPerson', ['error' => $this->validator]);
        } else {
            $this->_peopleModel->addPerson(
                $this->request->getVar('new-prename'),
                $this->request->getVar('new-surname'),
                $this->request->getVar('new-street'),
                $this->request->getVar('new-zip'),
                $this->request->getVar('new-city'),
                $this->_session->get('token')
            );
            $this->_session->setFlashdata('success', 'Person added.');
            return $this->response->redirect(site_url("people"));
        }

    }

    function editPerson($id = null): string
    {
        $data['person'] = $this->_peopleModel->getSinglePerson($id);
        return view("editPerson", $data);
    }

    function editPerson_Validation()
    {
        helper(['form', 'url']);


        $error = $this->validate([
            'edit-prename' => 'required',
            'edit-surname' => 'required',
            'edit-street' => 'required',
            'edit-zip' => 'required|min_length[5]|max_length[5]|numeric',
            'edit-city' => 'required'
        ],
            [
                'edit-prename' => [
                    'required' => 'A prename is required'
                ],
                'edit-surname' => [
                    'required' => 'A surname is required'
                ],
                'edit-streetname' => [
                    'required' => 'A street is required'
                ],
                'edit-zip' => [
                    'required' => 'A zip is required',
                    'min_length' => 'zip must be of length 5',
                    'max_length' => 'zip must be of length 5',
                    'numeric' => 'zip can only consist of numbers'
                ],
                'edit-city' => [
                    'required' => 'A city is required'
                ],
            ]);

        if (!$error) {
            $id = $this->request->getVar('id');
            $data['person'] = $this->_peopleModel->getSinglePerson($id);
            $data['error'] = $this->validator;
            return view('editPerson', $data);
        } else {
            $this->_peopleModel->updatePerson(
                $this->request->getVar('id'),
                $this->request->getVar('edit-prename'),
                $this->request->getVar('edit-surname'),
                $this->request->getVar('edit-street'),
                $this->request->getVar('edit-zip'),
                $this->request->getVar('edit-city'),
                $this->_session->get('token')
            );
            $this->_session->setFlashdata('success', 'Person updated');
            return $this->response->redirect(site_url("people"));
        }

    }

    function deletePerson($id): ResponseInterface
    {
        $this->_peopleModel->deletePerson($id);
        $this->_session->setFlashdata('success', 'Person deleted.');
        return $this->response->redirect(site_url("people"));
    }

}
