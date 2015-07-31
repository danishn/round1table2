<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * MembersInfo
 *
 * @ORM\Table(name="members_info", uniqueConstraints={@ORM\UniqueConstraint(name="member_id", columns={"member_id"})}, indexes={@ORM\Index(name="member_id_2", columns={"member_id"}), @ORM\Index(name="member_id_3", columns={"member_id"}), @ORM\Index(name="member_id_4", columns={"member_id"})})
 * @ORM\Entity
 */
class MembersInfo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $memberId;

    /**
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=50, nullable=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="mname", type="string", length=50, nullable=true)
     */
    private $mname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=50, nullable=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="big_url", type="text", length=65535, nullable=false)
     */
    private $bigUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb_url", type="text", length=65535, nullable=false)
     */
    private $thumbUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=20, nullable=false)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reg_date", type="date", nullable=false)
     */
    private $regDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="anniversary_date", type="date", nullable=true)
     */
    private $anniversaryDate;

    /**
     * @var string
     *
     * @ORM\Column(name="spouse_name", type="string", length=50, nullable=false)
     */
    private $spouseName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="spouse_dob", type="date", nullable=true)
     */
    private $spouseDob;

    /**
     * @var string
     *
     * @ORM\Column(name="spouse_mobile", type="string", length=20, nullable=true)
     */
    private $spouseMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="res_addr", type="text", length=65535, nullable=false)
     */
    private $resAddr;

    /**
     * @var string
     *
     * @ORM\Column(name="res_phone", type="string", length=20, nullable=true)
     */
    private $resPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="res_city", type="string", length=50, nullable=false)
     */
    private $resCity;

    /**
     * @var string
     *
     * @ORM\Column(name="office_addr", type="text", length=65535, nullable=false)
     */
    private $officeAddr;

    /**
     * @var string
     *
     * @ORM\Column(name="office_phone", type="string", length=20, nullable=false)
     */
    private $officePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="office_city", type="string", length=50, nullable=false)
     */
    private $officeCity;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=50, nullable=true)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="website_url", type="text", length=65535, nullable=true)
     */
    private $websiteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="other_details", type="text", length=65535, nullable=true)
     */
    private $otherDetails;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=20, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=20, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=15, nullable=false)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="blood_group", type="string", length=15, nullable=false)
     */
    private $bloodGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="business_areas", type="text", length=65535, nullable=false)
     */
    private $businessAreas;


    /**
     * Get memberId
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Set fname
     *
     * @param string $fname
     *
     * @return MembersInfo
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    
        return $this;
    }

    /**
     * Get fname
     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set mname
     *
     * @param string $mname
     *
     * @return MembersInfo
     */
    public function setMname($mname)
    {
        $this->mname = $mname;
    
        return $this;
    }

    /**
     * Get mname
     *
     * @return string
     */
    public function getMname()
    {
        return $this->mname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     *
     * @return MembersInfo
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    
        return $this;
    }

    /**
     * Get lname
     *
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set bigUrl
     *
     * @param string $bigUrl
     *
     * @return MembersInfo
     */
    public function setBigUrl($bigUrl)
    {
        $this->bigUrl = $bigUrl;
    
        return $this;
    }

    /**
     * Get bigUrl
     *
     * @return string
     */
    public function getBigUrl()
    {
        return $this->bigUrl;
    }

    /**
     * Set thumbUrl
     *
     * @param string $thumbUrl
     *
     * @return MembersInfo
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
    
        return $this;
    }

    /**
     * Get thumbUrl
     *
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return MembersInfo
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return MembersInfo
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    
        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return MembersInfo
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    
        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return MembersInfo
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set regDate
     *
     * @param \DateTime $regDate
     *
     * @return MembersInfo
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;
    
        return $this;
    }

    /**
     * Get regDate
     *
     * @return \DateTime
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set anniversaryDate
     *
     * @param \DateTime $anniversaryDate
     *
     * @return MembersInfo
     */
    public function setAnniversaryDate($anniversaryDate)
    {
        $this->anniversaryDate = $anniversaryDate;
    
        return $this;
    }

    /**
     * Get anniversaryDate
     *
     * @return \DateTime
     */
    public function getAnniversaryDate()
    {
        return $this->anniversaryDate;
    }

    /**
     * Set spouseName
     *
     * @param string $spouseName
     *
     * @return MembersInfo
     */
    public function setSpouseName($spouseName)
    {
        $this->spouseName = $spouseName;
    
        return $this;
    }

    /**
     * Get spouseName
     *
     * @return string
     */
    public function getSpouseName()
    {
        return $this->spouseName;
    }

    /**
     * Set spouseDob
     *
     * @param \DateTime $spouseDob
     *
     * @return MembersInfo
     */
    public function setSpouseDob($spouseDob)
    {
        $this->spouseDob = $spouseDob;
    
        return $this;
    }

    /**
     * Get spouseDob
     *
     * @return \DateTime
     */
    public function getSpouseDob()
    {
        return $this->spouseDob;
    }

    /**
     * Set spouseMobile
     *
     * @param string $spouseMobile
     *
     * @return MembersInfo
     */
    public function setSpouseMobile($spouseMobile)
    {
        $this->spouseMobile = $spouseMobile;
    
        return $this;
    }

    /**
     * Get spouseMobile
     *
     * @return string
     */
    public function getSpouseMobile()
    {
        return $this->spouseMobile;
    }

    /**
     * Set resAddr
     *
     * @param string $resAddr
     *
     * @return MembersInfo
     */
    public function setResAddr($resAddr)
    {
        $this->resAddr = $resAddr;
    
        return $this;
    }

    /**
     * Get resAddr
     *
     * @return string
     */
    public function getResAddr()
    {
        return $this->resAddr;
    }

    /**
     * Set resPhone
     *
     * @param string $resPhone
     *
     * @return MembersInfo
     */
    public function setResPhone($resPhone)
    {
        $this->resPhone = $resPhone;
    
        return $this;
    }

    /**
     * Get resPhone
     *
     * @return string
     */
    public function getResPhone()
    {
        return $this->resPhone;
    }

    /**
     * Set resCity
     *
     * @param string $resCity
     *
     * @return MembersInfo
     */
    public function setResCity($resCity)
    {
        $this->resCity = $resCity;
    
        return $this;
    }

    /**
     * Get resCity
     *
     * @return string
     */
    public function getResCity()
    {
        return $this->resCity;
    }

    /**
     * Set officeAddr
     *
     * @param string $officeAddr
     *
     * @return MembersInfo
     */
    public function setOfficeAddr($officeAddr)
    {
        $this->officeAddr = $officeAddr;
    
        return $this;
    }

    /**
     * Get officeAddr
     *
     * @return string
     */
    public function getOfficeAddr()
    {
        return $this->officeAddr;
    }

    /**
     * Set officePhone
     *
     * @param string $officePhone
     *
     * @return MembersInfo
     */
    public function setOfficePhone($officePhone)
    {
        $this->officePhone = $officePhone;
    
        return $this;
    }

    /**
     * Get officePhone
     *
     * @return string
     */
    public function getOfficePhone()
    {
        return $this->officePhone;
    }

    /**
     * Set officeCity
     *
     * @param string $officeCity
     *
     * @return MembersInfo
     */
    public function setOfficeCity($officeCity)
    {
        $this->officeCity = $officeCity;
    
        return $this;
    }

    /**
     * Get officeCity
     *
     * @return string
     */
    public function getOfficeCity()
    {
        return $this->officeCity;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return MembersInfo
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    
        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return MembersInfo
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set websiteUrl
     *
     * @param string $websiteUrl
     *
     * @return MembersInfo
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    
        return $this;
    }

    /**
     * Get websiteUrl
     *
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * Set otherDetails
     *
     * @param string $otherDetails
     *
     * @return MembersInfo
     */
    public function setOtherDetails($otherDetails)
    {
        $this->otherDetails = $otherDetails;
    
        return $this;
    }

    /**
     * Get otherDetails
     *
     * @return string
     */
    public function getOtherDetails()
    {
        return $this->otherDetails;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return MembersInfo
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return MembersInfo
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return MembersInfo
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    
        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set bloodGroup
     *
     * @param string $bloodGroup
     *
     * @return MembersInfo
     */
    public function setBloodGroup($bloodGroup)
    {
        $this->bloodGroup = $bloodGroup;
    
        return $this;
    }

    /**
     * Get bloodGroup
     *
     * @return string
     */
    public function getBloodGroup()
    {
        return $this->bloodGroup;
    }

    /**
     * Set businessAreas
     *
     * @param string $businessAreas
     *
     * @return MembersInfo
     */
    public function setBusinessAreas($businessAreas)
    {
        $this->businessAreas = $businessAreas;
    
        return $this;
    }

    /**
     * Get businessAreas
     *
     * @return string
     */
    public function getBusinessAreas()
    {
        return $this->businessAreas;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     *
     * @return MembersInfo
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=50, nullable=false)
     */
    private $company;


    /**
     * Set company
     *
     * @param string $company
     *
     * @return MembersInfo
     */
    public function setCompany($company)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }
}
