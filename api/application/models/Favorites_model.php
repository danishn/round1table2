<?php

class Favorites_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('upload');
                $this->em = $this->doctrine->em;
        }

        /*
         * get All favorites
        */
        public function get_all()
        {  
            $favorites = $this->doctrine->em->getRepository('Entities\Favorites')->findBy(array('status'=>true));
			
            if(!$favorites)
			{
				return 'error No data available';
			}
			
			foreach($favorites as $key => $favorites){
				$temp[$key]['brand_id'] = $favorites->getBrandId();
				$temp[$key]['brand_name'] = $favorites->getBrandName();
				$temp[$key]['image_url'] = $favorites->getImageUrl();
				$temp[$key]['website_url'] = $favorites->getWebsiteUrl();
                //$temp[$key]['offer_description'] = $favorites->getOfferDesc();
			}
            return $temp;  
        }
    

    /*
     * Add new favorites
    */

        public function add_favorites($brand_name, $website_url, $offer_description = '-', $status = true)
        {  
            $bigUrl = '/api/public/images/big/favorites/rtn.jpg';

			$favorites = new Entities\Favorites;
            
            if(isset($_FILES['favorites_image']))
            {
                // upload event photo to server & set image URLs
                $config['upload_path'] = 'public/images/big/favorites';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '10000';

				$this->load->library('upload', $config);
                $this->upload->initialize($config);
                
				if ( !$this->upload->do_upload('favorites_image')) {
					//var_dump($this->upload->display_errors());
					return 'error '.$this->upload->display_errors();
                    exit;
				} else {
					$data = $this->upload->data();
					$bigUrl = '/api/public/images/big/favorites/' . $data['file_name'];
				}
                
            }
            //var_dump($news);exit;
            
            $favorites->setBrandName($brand_name);
            $favorites->setImageUrl($bigUrl);
            $favorites->setWebsiteUrl($website_url);
            $favorites->setOfferDesc($offer_description);
            $favorites->setStatus($status);
            
            try
            {
               $this->em->persist($favorites);
                $this->em->flush();
                return $favorites->getBrandId();
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
            
        }

	
        /*
         * find favorites by brand name
        */
   /*
        public function find_favorites($searchBy, $searchKey)
        {  
            $favoritesInfo = null;
            var_dump($searchBy);
            switch($searchBy)
            {
                case "brandName":
                    $favoritesInfo = $this->em
                                    ->getRepository('Entities\Favorites')
                                    ->createQueryBuilder('f')
                                    ->where('f.brandName LIKE :name')
                                    ->setParameter(':name', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                default:
                    return 'error Search Not Supported for this field type';
            }
           
            $temp = null;
            
			foreach($favoritesInfo as $key => $favoritesInfo)
            {      

                $temp[$key]['brand_id'] = $favoritesInfo->getBrandId();
				$temp[$key]['brand_name'] = $favoritesInfo->getBrandName();
				$temp[$key]['offer_description'] = $favoritesInfo->getOfferDesc();
				$temp[$key]['image_url'] = $favoritesInfo->getImageUrl();
				$temp[$key]['website_url'] = $favoritesInfo->getWebsiteUrl();

            }
            //var_dump($temp);exit;
            if(!is_array($temp))
            {
                return 'error No Favorites found';
            }
            return $temp;  

        }
    
    */

}