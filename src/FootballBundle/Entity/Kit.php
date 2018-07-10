<?php

namespace FootballBundle\Entity;

/**
 * Kit
 */
class Kit
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $shirtColor;

    /**
     * @var string
     */
    private $shortsColor;


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
     * Set shirtColor
     *
     * @param string $shirtColor
     *
     * @return Kit
     */
    public function setShirtColor($shirtColor)
    {
        $this->shirtColor = $shirtColor;

        return $this;
    }

    /**
     * Get shirtColor
     *
     * @return string
     */
    public function getShirtColor()
    {
        return $this->shirtColor;
    }

    /**
     * Set shortsColor
     *
     * @param string $shortsColor
     *
     * @return Kit
     */
    public function setShortsColor($shortsColor)
    {
        $this->shortsColor = $shortsColor;

        return $this;
    }

    /**
     * Get shortsColor
     *
     * @return string
     */
    public function getShortsColor()
    {
        return $this->shortsColor;
    }
    /**
     * @var \FootballBundle\Entity\Team
     */
    private $team;


    /**
     * Set team
     *
     * @param \FootballBundle\Entity\Team $team
     *
     * @return Kit
     */
    public function setTeam(\FootballBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \FootballBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }
}
