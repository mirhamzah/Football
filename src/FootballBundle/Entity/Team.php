<?php

namespace FootballBundle\Entity;

/**
 * Team
 */
class Team
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @var \FootballBundle\Entity\Team
     */
    private $league;


    /**
     * Set league
     *
     * @param \FootballBundle\Entity\Team $league
     *
     * @return Team
     */
    public function setLeague(\FootballBundle\Entity\Team $league = null)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return \FootballBundle\Entity\Team
     */
    public function getLeague()
    {
        return $this->league;
    }
}
