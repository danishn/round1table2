<?php

class Event_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
        }
    
    /*
     * Retrive all events
    */
    
    public function get_all()
    {  
        $tables = $this->em->getRepository('Entities\Tables')->findBy(array('status' => true));
        if(!$tables)
        {
            return 'error No data available';
        }
        
        //var_dump($tables);exit;
        
        foreach($tables as $key => $table){
            $temp[$key]['table_id'] = $table->getTableId();
            $temp[$key]['table_name'] = $table->getTableName();
            $temp[$key]['table_code'] = $table->getTableCode();
            $temp[$key]['table_description'] = $table->getDescription();
            $temp[$key]['table_big_url'] = $table->getBigUrl();
            $temp[$key]['table_thumb_url'] = $table->getThumbUrl();
            $temp[$key]['table_members'] = $table->getMembersCount();
        }
        
        return $temp;
    }

    
    /*
     * Add new event
    */

        public function add_event($name, $code, $desc = '-', $bigUrl, $thumbUrl, $members)
        {  
            $table = new Entities\Tables;
            
            $table->setTableName($name);
            $table->setTableCode($code);
            $table->setDescription($desc);
            $table->setCreatedOn( new \DateTime("now"));
            $table->setStatus(true);
            $table->setBigUrl($bigUrl);
            $table->setThumbUrl($thumbUrl);
            $table->setMembersCount($members);
            
            try
            {
               $this->em->persist($table);
                $this->em->flush();
                return $table->getTableId();
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
        }

}