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
        
        public function search($param1, $param2)
        {
         //$memberInfo = $this->doctrine->em->getRepository('Entities\Members')->findAll();//By(array('tableId'=>$table_id));
           //var_dump($memberInfo);exit;
            $memberInfo = $this->em->getRepository('Entities\MembersInfo')
                                    ->createQueryBuilder('m')
                                    ->select('m.officePhone', 'm.bloodGroup')
                                    ->distinct()
                                    ->getQuery()
                                    ->getResult();// execute()
            
            var_dump($memberInfo);exit;
            
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
            $users = $this->doctrine->em->getRepository('Entities\Members')->findAll();;    
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