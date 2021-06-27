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
        $this->_people = $this->db->table('personen');
    }


    /**
     * @return array - all people from the database
     */
    public function getPeople(): array
    {
        return $this->_people->get()->getResult();
    }

    /**
     * @param $surname
     * @param $name
     * @param $street
     * @param $plz
     * @param $city
     *
     * insert new person into the database
     */
    public function addPerson($prename, $name, $street, $plz, $city, $created_by) {
        $data = [
            'vorname' => $prename,
            'name' => $name,
            'strasse' => $street,
            'plz' => $plz,
            'ort' => $city,
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
     * @param $surname
     * @param $name
     * @param $street
     * @param $plz
     * @param $city
     *
     * update person with $id by given values
     */
    public function updatePerson($id, $surname, $name, $street, $plz, $city, $edited_by){
        $this->_people->where("id", $id);
        $data = [
            'vorname' => $surname,
            'name' => $name,
            'strasse' => $street,
            'plz' => $plz,
            'ort' => $city,
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
