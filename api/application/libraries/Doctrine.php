<?php

/*
 *  Reference :: http://codesamplez.com/development/using-doctrine-with-codeigniter
*/
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger,
    Doctrine\ORM\Mapping\Driver\DatabaseDriver,
    Doctrine\ORM\Tools\DisconnectedClassMetadataFactory,
    Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Proxy\AbstractProxyFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * CodeIgniter Smarty Class
 *
 * initializes basic doctrine settings and act as doctrine object
 *
 * @final   Doctrine 
 * @category    Libraries
 * @author  Md. Ali Ahsan Rana
 * @link    http://codesamplez.com/
 */
class Doctrine {
 
  /**
   * @var EntityManager $em 
   */
    public $em = null;
 
    
  /**
   * constructor
   */
  public function __construct()
  {
  	// load database configuration from CodeIgniter
  	require APPPATH.'config/database.php';
  	 
  	// Set up class loading. You could use different autoloaders, provided by your favorite framework,
  	// if you want to.
  	require_once APPPATH.'third_party/Doctrine/Common/ClassLoader.php';
  
  	$doctrineClassLoader = new ClassLoader('Doctrine',  APPPATH.'third_party');
  	$doctrineClassLoader->register();
  
  	// load the entities
  	$entityClassLoader = new \Doctrine\Common\ClassLoader('Entities', APPPATH.'models');
  	$entityClassLoader->register();
  	
  	// load the proxy entities
  	$proxyClassLoader = new \Doctrine\Common\ClassLoader('Proxies', APPPATH.'models');
  	$proxyClassLoader->register();
  	
  	$applicationMode = "production";
  	
  	if ($applicationMode == "development") {
  		//$cache = new \Doctrine\Common\Cache\ArrayCache;
  		$cache = new ArrayCache();
  	} else {
  		//$cache = new \Doctrine\Common\Cache\ApcCache;
  		//$cache = new ApcCache();
  		$cache = new ArrayCache();
  		//$cache = new \Doctrine\Common\Cache\ArrayCache;
  	}
  	
  	$config = new Configuration;
  	$config->setMetadataCacheImpl($cache);
  	$driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH.'models/Entities'));
  	$config->setMetadataDriverImpl($driverImpl);
  	$config->setQueryCacheImpl($cache);
  	$config->setProxyDir(APPPATH.'models/Proxies');
  	$config->setProxyNamespace('Proxies');
  	
  	if ($applicationMode == "development") {
  		$config->setAutoGenerateProxyClasses(true);
  	} else {
  		//$config->setAutoGenerateProxyClasses(false);
  		//$config->setAutoGenerateProxyClasses(true);
  		$config->setAutoGenerateProxyClasses(AbstractProxyFactory::AUTOGENERATE_NEVER);
  	}

  	$connectionOptions = array(
  			'driver' => 'pdo_mysql',
  			'user' =>     $db['default']['username'],
  			'password' => $db['default']['password'],
  			'host' =>     $db['default']['hostname'],
  			'dbname' =>   $db['default']['database']
  	);
  	
  	// Create EntityManager
  	$this->em = EntityManager::create($connectionOptions, $config);
  	$this->generate_classes();
  }
    /**
   * generate entity objects automatically from mysql db tables
   * @return none
   */
 public function generate_classes(){     
       
 	$db_driver = new DatabaseDriver(
                        $this->em->getConnection()->getSchemaManager()
                );
 	$db_driver->setNamespace('Entities\\');
 	
    $this->em->getConfiguration()
             ->setMetadataDriverImpl(
                $db_driver
    );
    //var_dump($this->em);
    $cmf = new DisconnectedClassMetadataFactory();
    $cmf->setEntityManager($this->em);
    $metadata = $cmf->getAllMetadata();     
    /*
    $generator = new EntityGenerator();
     
    $generator->setUpdateEntityIfExists(true);
    $generator->setGenerateStubMethods(true);
    $generator->setGenerateAnnotations(true);
    
    $generator->generate($metadata, APPPATH."models");
     */
  }
}

