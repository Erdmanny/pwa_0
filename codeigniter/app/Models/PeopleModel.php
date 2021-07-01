<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class PeopleModel extends Model
{

    private $_people;

    /**
     * Pwa_model constructor.
     * Connect to the database.
     */
    public function __construct()
    {
        $this->db = Database::connect();
        $this->_people = $this->db->table('persons');
    }


    /**
     * @return array - all people from the database
     */
    public function getPeople(): array
    {
        return $this->_people->get()->getResult();
    }

    /**
     * @param $prename
     * @param $name
     * @param $street
     * @param $zip
     * @param $city
     *
     * insert new person into the database
     */
    public function addPerson($prename, $name, $street, $zip, $city, $created_by) {
        $data = [
            'prename' => $prename,
            'name' => $name,
            'street' => $street,
            'zip' => $zip,
            'city' => $city,
            'created_by' => $created_by
        ];
        $this->_people->insert($data);
    }


    /**
     * @param $id
     * @return mixed - single person with $id
     */
    public function getSinglePerson($id)
    {
        return $this->_people
            ->where("id", $id)
            ->get()
            ->getFirstRow();
    }


    /**
     * @param $id
     * @param $prename
     * @param $name
     * @param $street
     * @param $zip
     * @param $city
     *
     * update person with $id by given values
     */
    public function updatePerson($id, $prename, $name, $street, $zip, $city, $edited_by){
        $this->_people->where("id", $id);
        $data = [
            'prename' => $prename,
            'name' => $name,
            'street' => $street,
            'zip' => $zip,
            'city' => $city,
            'edited_by' => $edited_by
        ];
        $this->_people->update($data);
    }

    /**
     * @param $id
     *
     * delete person with $id
     */
    public function deletePerson($id){
        $this->_people->where("id", $id);
        $this->_people->delete();
    }
}
