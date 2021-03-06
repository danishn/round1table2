<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Tables extends \Entities\Tables implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entities\\Tables' . "\0" . 'tableId', '' . "\0" . 'Entities\\Tables' . "\0" . 'tableName', '' . "\0" . 'Entities\\Tables' . "\0" . 'tableCode', '' . "\0" . 'Entities\\Tables' . "\0" . 'description', '' . "\0" . 'Entities\\Tables' . "\0" . 'createdOn', '' . "\0" . 'Entities\\Tables' . "\0" . 'status', '' . "\0" . 'Entities\\Tables' . "\0" . 'bigUrl', '' . "\0" . 'Entities\\Tables' . "\0" . 'thumbUrl', '' . "\0" . 'Entities\\Tables' . "\0" . 'membersCount');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\Tables' . "\0" . 'tableId', '' . "\0" . 'Entities\\Tables' . "\0" . 'tableName', '' . "\0" . 'Entities\\Tables' . "\0" . 'tableCode', '' . "\0" . 'Entities\\Tables' . "\0" . 'description', '' . "\0" . 'Entities\\Tables' . "\0" . 'createdOn', '' . "\0" . 'Entities\\Tables' . "\0" . 'status', '' . "\0" . 'Entities\\Tables' . "\0" . 'bigUrl', '' . "\0" . 'Entities\\Tables' . "\0" . 'thumbUrl', '' . "\0" . 'Entities\\Tables' . "\0" . 'membersCount');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Tables $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getTableId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getTableId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTableId', array());

        return parent::getTableId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTableName($tableName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTableName', array($tableName));

        return parent::setTableName($tableName);
    }

    /**
     * {@inheritDoc}
     */
    public function getTableName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTableName', array());

        return parent::getTableName();
    }

    /**
     * {@inheritDoc}
     */
    public function setTableCode($tableCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTableCode', array($tableCode));

        return parent::setTableCode($tableCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getTableCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTableCode', array());

        return parent::getTableCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', array($description));

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', array());

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedOn($createdOn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedOn', array($createdOn));

        return parent::setCreatedOn($createdOn);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedOn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedOn', array());

        return parent::getCreatedOn();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setBigUrl($bigUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBigUrl', array($bigUrl));

        return parent::setBigUrl($bigUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getBigUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBigUrl', array());

        return parent::getBigUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setThumbUrl($thumbUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setThumbUrl', array($thumbUrl));

        return parent::setThumbUrl($thumbUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getThumbUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getThumbUrl', array());

        return parent::getThumbUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setMembersCount($membersCount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMembersCount', array($membersCount));

        return parent::setMembersCount($membersCount);
    }

    /**
     * {@inheritDoc}
     */
    public function getMembersCount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMembersCount', array());

        return parent::getMembersCount();
    }

}
