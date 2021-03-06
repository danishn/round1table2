

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
   /* $entitiesClassLoader = new ClassLoader('models', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();
    $proxiesClassLoader = new ClassLoader('proxies', APPPATH.'models');
    $proxiesClassLoader->register();
*/
      
   // load the entities
    $entityClassLoader = new \Doctrine\Common\ClassLoader('Entities', APPPATH.'models');
    $entityClassLoader->register();

    // load the proxy entities
    $proxyClassLoader = new \Doctrine\Common\ClassLoader('Proxies', APPPATH.'models');
    $proxyClassLoader->register();

 
    // Set up caches
    $config = new Configuration;
    $cache = new ArrayCache;
    $config->setMetadataCacheImpl($cache);
    $driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH.'models/Entities'));
    $config->setMetadataDriverImpl($driverImpl);
    $config->setQueryCacheImpl($cache);
 
    // Proxy configuration
    $config->setProxyDir(APPPATH.'models/Proxies');
    $config->setProxyNamespace('Proxies');
 
    // Set up logger
    //$logger = new EchoSQLLogger;
    //$config->setSQLLogger($logger);
 
    $config->setAutoGenerateProxyClasses( TRUE );   
    // Database connection information
    $connectionOptions = array(
        'driver' => 'pdo_mysql',
        'user' =>     $db['default']['username'],
        'password' => $db['default']['password'],
        'host' =>     $db['default']['hostname'],
        'dbname' =>   $db['default']['database']
    );
 
    // Create EntityManager
    $this->em = EntityManager::create($connectionOptions, $config);   
    // Uncomment this whenever database schema change occure
    // After this run on cmd ::  php cli-config.php orm:generate-proxies to generate/ update proxies.
    $this->generate_classes();
     
  } 
    
    
    /**
   * generate entity objects automatically from mysql db tables
   * @return none
   */
 public function generate_classes(){     
     
    $driver = new DatabaseDriver(
                        $this->em->getConnection()->getSchemaManager()
                );
     $driver->setNamespace('Entities\\');
     
    $this->em->getConfiguration()->setMetadataDriverImpl($driver);
    //var_dump($this->em);
    $cmf = new DisconnectedClassMetadataFactory();
    $cmf->setEntityManager($this->em);
    $metadata = $cmf->getAllMetadata();     
    $generator = new EntityGenerator();
     
    $generator->setUpdateEntityIfExists(true);
    $generator->setGenerateStubMethods(true);
    $generator->setGenerateAnnotations(true);
    $generator->generate($metadata, APPPATH."models");
     
     // php cli-config.php orm:generate-proxies           -------- run this to generate proxies for generated entity classs
     
  }
}

