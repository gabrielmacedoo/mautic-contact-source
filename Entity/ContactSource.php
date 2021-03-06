<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\MauticContactSourceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mautic\ApiBundle\Serializer\Driver\ApiMetadataDriver;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;
use Mautic\CoreBundle\Entity\FormEntity;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Class ContactSource.
 *
 * Entity is used to contain all the rules necessary to create a dynamic integration called a Contact Source.
 */
class ContactSource extends FormEntity
{
    /** @var int */
    private $id;

    /** @var string */
    private $utm_source;

    /** @var string */
    private $description;

    /** @var string */
    private $description_public;

    /** @var string */
    private $name;

    /** @var */
    private $category;

    /** @var string */
    private $token;

    /** @var bool */
    private $documentation;

    /** @var string */
    private $campaign_settings;

    /** @var \DateTime */
    private $publishUp;

    /** @var \DateTime */
    private $publishDown;

    /**
     * ContactSource constructor.
     */
    public function __construct()
    {
        if (!$this->token) {
            $this->token = sha1(uniqid());
        }
    }

    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint(
            'name',
            new NotBlank(
                ['message' => 'mautic.core.name.required']
            )
        );

        $metadata->addPropertyConstraint(
            'token',
            new NotBlank(
                ['message' => 'mautic.contactsource.error.token']
            )
        );
    }

    /**
     * @param ORM\ClassMetadata $metadata
     */
    public static function loadMetadata(ORM\ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('contactsource')
            ->setCustomRepositoryClass('MauticPlugin\MauticContactSourceBundle\Entity\ContactSourceRepository');

        $builder->addIdColumns();

        $builder->addCategory();

        $builder->addPublishDates();

        $builder->addNullableField('utm_source', 'string');

        $builder->addNullableField('description_public', 'string');

        $builder->addField('token', 'string');

        $builder->addField('documentation', 'boolean');

        $builder->addNullableField('campaign_settings', 'text');
    }

    /**
     * Prepares the metadata for API usage.
     *
     * @param $metadata
     */
    public static function loadApiMetadata(ApiMetadataDriver $metadata)
    {
        $metadata
            ->addListProperties(
                [
                    'id',
                    'name',
                    'category',
                ]
            )
            ->addProperties(
                [
                    'description',
                    'description_public',
                    'utm_source',
                    'token',
                    'documentation',
                    'publishUp',
                    'publishDown',
                    'campaign_settings',
                ]
            )
            ->build();
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $token = trim($token);

        $this->isChanged('token', $token);

        $this->token = $token;

        return $this;
    }

    /**
     * @return bool
     */
    public function getDocumentation()
    {
        return $this->documentation;
    }

    /**
     * @param bool $documentation
     *
     * @return $this
     */
    public function setDocumentation($documentation)
    {
        $this->isChanged('documentation', $documentation);

        $this->documentation = $documentation;

        return $this;
    }

    /**
     * @return string
     */
    public function getCampaignSettings()
    {
        return $this->campaign_settings;
    }

    /**
     * @param string $campaign_settings
     *
     * @return $this
     */
    public function setCampaignSettings($campaign_settings)
    {
        $this->isChanged('campaignSettings', $campaign_settings);

        $this->campaign_settings = $campaign_settings;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return ContactSource
     */
    public function setDescription($description)
    {
        $this->isChanged('description', $description);

        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionPublic()
    {
        return $this->description_public;
    }

    /**
     * @param string $description_public
     *
     * @return ContactSource
     */
    public function setDescriptionPublic($description_public)
    {
        $this->isChanged('descriptionPublic', $description_public);

        $this->description_public = $description_public;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return ContactSource
     */
    public function setName($name)
    {
        $this->isChanged('name', $name);

        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmSource()
    {
        return $this->utm_source;
    }

    /**
     * @param mixed $utm_source
     *
     * @return ContactSource
     */
    public function setUtmSource($utm_source)
    {
        $this->isChanged('utm_source', $utm_source);

        $this->utm_source = $utm_source;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     *
     * @return ContactSource
     */
    public function setCategory($category)
    {
        $this->isChanged('category', $category);

        $this->category = $category;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublishUp()
    {
        return $this->publishUp;
    }

    /**
     * @param mixed $publishUp
     *
     * @return ContactSource
     */
    public function setPublishUp($publishUp)
    {
        $this->isChanged('publishUp', $publishUp);

        $this->publishUp = $publishUp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublishDown()
    {
        return $this->publishDown;
    }

    /**
     * @param mixed $publishDown
     *
     * @return ContactSource
     */
    public function setPublishDown($publishDown)
    {
        $this->isChanged('publishDown', $publishDown);

        $this->publishDown = $publishDown;

        return $this;
    }
}
