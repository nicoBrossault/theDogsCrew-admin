<?php



use Doctrine\Mapping as ORM;

/**
 * Compte
 *
 * @Table(name="compte")
 * @Entity
 */
class Compte
{
    /**
     * @var integer $idcompte
     *
     * @Column(name="idCompte", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idcompte;

    /**
     * @var string $ip
     *
     * @Column(name="ip", type="string", length=16, nullable=false)
     */
    private $ip;

    /**
     * @var string $pays
     *
     * @Column(name="pays", type="string", length=60, nullable=true)
     */
    private $pays;

    /**
     * @var string $region
     *
     * @Column(name="region", type="string", length=60, nullable=true)
     */
    private $region;

    /**
     * @var datetime $date
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;


    /**
     * Get idcompte
     *
     * @return integer 
     */
    public function getIdcompte()
    {
        return $this->idcompte;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Compte
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Compte
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Compte
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set date
     *
     * @param datetime $date
     * @return Compte
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }
}