<?php

/*require_once(APPPATH."models/Entities/Users.php");
use \Users;
*/
class Test_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
        }

        public function getAllData()
        {
                $query = $this->db->get('test_tb');
                return $query->result();
        }

        public function add()
        {
                $user = new Entities\Users;
                $user->setName('Danish');
            
                $this->em->persist($user);
                $this->em->flush();
        }

        public function getAll()
        {
            $users = $this->doctrine->em->getRepository('Entities\Users')->find(1);;    
            return $users;
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}