<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MembersInfo extends \Entities\MembersInfo implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'fname', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'mname', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'lname', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'bigUrl', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'thumbUrl', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'gender', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'dob', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'mobile', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'email', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'regDate', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'anniversaryDate', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'spouseName', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'spouseDob', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'spouseMobile', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'resAddr', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'resPhone', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'resCity', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'officeAddr', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'officePhone', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'officeCity', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'designation', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'fax', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'websiteUrl', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'otherDetails', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'state', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'country', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'zip', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'bloodGroup', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'businessAreas', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'member');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'fname', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'mname', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'lname', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'bigUrl', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'thumbUrl', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'gender', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'dob', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'mobile', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'email', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'regDate', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'anniversaryDate', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'spouseName', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'spouseDob', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'spouseMobile', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'resAddr', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'resPhone', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'resCity', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'officeAddr', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'officePhone', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'officeCity', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'designation', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'fax', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'websiteUrl', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'otherDetails', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'state', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'country', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'zip', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'bloodGroup', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'businessAreas', '' . "\0" . 'Entities\\MembersInfo' . "\0" . 'member');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MembersInfo $proxy) {
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
    public function setFname($fname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFname', array($fname));

        return parent::setFname($fname);
    }

    /**
     * {@inheritDoc}
     */
    public function getFname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFname', array());

        return parent::getFname();
    }

    /**
     * {@inheritDoc}
     */
    public function setMname($mname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMname', array($mname));

        return parent::setMname($mname);
    }

    /**
     * {@inheritDoc}
     */
    public function getMname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMname', array());

        return parent::getMname();
    }

    /**
     * {@inheritDoc}
     */
    public function setLname($lname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLname', array($lname));

        return parent::setLname($lname);
    }

    /**
     * {@inheritDoc}
     */
    public function getLname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLname', array());

        return parent::getLname();
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
    public function setGender($gender)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGender', array($gender));

        return parent::setGender($gender);
    }

    /**
     * {@inheritDoc}
     */
    public function getGender()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGender', array());

        return parent::getGender();
    }

    /**
     * {@inheritDoc}
     */
    public function setDob($dob)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDob', array($dob));

        return parent::setDob($dob);
    }

    /**
     * {@inheritDoc}
     */
    public function getDob()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDob', array());

        return parent::getDob();
    }

    /**
     * {@inheritDoc}
     */
    public function setMobile($mobile)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMobile', array($mobile));

        return parent::setMobile($mobile);
    }

    /**
     * {@inheritDoc}
     */
    public function getMobile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMobile', array());

        return parent::getMobile();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegDate($regDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegDate', array($regDate));

        return parent::setRegDate($regDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegDate', array());

        return parent::getRegDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnniversaryDate($anniversaryDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnniversaryDate', array($anniversaryDate));

        return parent::setAnniversaryDate($anniversaryDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnniversaryDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnniversaryDate', array());

        return parent::getAnniversaryDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setSpouseName($spouseName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpouseName', array($spouseName));

        return parent::setSpouseName($spouseName);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpouseName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpouseName', array());

        return parent::getSpouseName();
    }

    /**
     * {@inheritDoc}
     */
    public function setSpouseDob($spouseDob)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpouseDob', array($spouseDob));

        return parent::setSpouseDob($spouseDob);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpouseDob()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpouseDob', array());

        return parent::getSpouseDob();
    }

    /**
     * {@inheritDoc}
     */
    public function setSpouseMobile($spouseMobile)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpouseMobile', array($spouseMobile));

        return parent::setSpouseMobile($spouseMobile);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpouseMobile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpouseMobile', array());

        return parent::getSpouseMobile();
    }

    /**
     * {@inheritDoc}
     */
    public function setResAddr($resAddr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResAddr', array($resAddr));

        return parent::setResAddr($resAddr);
    }

    /**
     * {@inheritDoc}
     */
    public function getResAddr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResAddr', array());

        return parent::getResAddr();
    }

    /**
     * {@inheritDoc}
     */
    public function setResPhone($resPhone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResPhone', array($resPhone));

        return parent::setResPhone($resPhone);
    }

    /**
     * {@inheritDoc}
     */
    public function getResPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResPhone', array());

        return parent::getResPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setResCity($resCity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResCity', array($resCity));

        return parent::setResCity($resCity);
    }

    /**
     * {@inheritDoc}
     */
    public function getResCity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResCity', array());

        return parent::getResCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setOfficeAddr($officeAddr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOfficeAddr', array($officeAddr));

        return parent::setOfficeAddr($officeAddr);
    }

    /**
     * {@inheritDoc}
     */
    public function getOfficeAddr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOfficeAddr', array());

        return parent::getOfficeAddr();
    }

    /**
     * {@inheritDoc}
     */
    public function setOfficePhone($officePhone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOfficePhone', array($officePhone));

        return parent::setOfficePhone($officePhone);
    }

    /**
     * {@inheritDoc}
     */
    public function getOfficePhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOfficePhone', array());

        return parent::getOfficePhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setOfficeCity($officeCity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOfficeCity', array($officeCity));

        return parent::setOfficeCity($officeCity);
    }

    /**
     * {@inheritDoc}
     */
    public function getOfficeCity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOfficeCity', array());

        return parent::getOfficeCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setDesignation($designation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDesignation', array($designation));

        return parent::setDesignation($designation);
    }

    /**
     * {@inheritDoc}
     */
    public function getDesignation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDesignation', array());

        return parent::getDesignation();
    }

    /**
     * {@inheritDoc}
     */
    public function setFax($fax)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFax', array($fax));

        return parent::setFax($fax);
    }

    /**
     * {@inheritDoc}
     */
    public function getFax()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFax', array());

        return parent::getFax();
    }

    /**
     * {@inheritDoc}
     */
    public function setWebsiteUrl($websiteUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWebsiteUrl', array($websiteUrl));

        return parent::setWebsiteUrl($websiteUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getWebsiteUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebsiteUrl', array());

        return parent::getWebsiteUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setOtherDetails($otherDetails)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOtherDetails', array($otherDetails));

        return parent::setOtherDetails($otherDetails);
    }

    /**
     * {@inheritDoc}
     */
    public function getOtherDetails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOtherDetails', array());

        return parent::getOtherDetails();
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', array($state));

        return parent::setState($state);
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', array());

        return parent::getState();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry($country)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', array($country));

        return parent::setCountry($country);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', array());

        return parent::getCountry();
    }

    /**
     * {@inheritDoc}
     */
    public function setZip($zip)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setZip', array($zip));

        return parent::setZip($zip);
    }

    /**
     * {@inheritDoc}
     */
    public function getZip()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getZip', array());

        return parent::getZip();
    }

    /**
     * {@inheritDoc}
     */
    public function setBloodGroup($bloodGroup)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBloodGroup', array($bloodGroup));

        return parent::setBloodGroup($bloodGroup);
    }

    /**
     * {@inheritDoc}
     */
    public function getBloodGroup()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBloodGroup', array());

        return parent::getBloodGroup();
    }

    /**
     * {@inheritDoc}
     */
    public function setBusinessAreas($businessAreas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBusinessAreas', array($businessAreas));

        return parent::setBusinessAreas($businessAreas);
    }

    /**
     * {@inheritDoc}
     */
    public function getBusinessAreas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBusinessAreas', array());

        return parent::getBusinessAreas();
    }

    /**
     * {@inheritDoc}
     */
    public function setMember(\Entities\Members $member)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMember', array($member));

        return parent::setMember($member);
    }

    /**
     * {@inheritDoc}
     */
    public function getMember()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMember', array());

        return parent::getMember();
    }

}