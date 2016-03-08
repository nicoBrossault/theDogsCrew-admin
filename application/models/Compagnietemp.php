<?php



use Doctrine\Mapping as ORM;

/**
 * Compagnietemp
 *
 * @Table(name="compagnietemp")
 * @Entity
 */
class Compagnietemp
{
    /**
     * @var integer $idcompagnietemp
     *
     * @Column(name="idCompagnieTemp", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idcompagnietemp;

    /**
     * @var text $imagetemp
     *
     * @Column(name="imageTemp", type="text", nullable=true)
     */
    private $imagetemp;

    /**
     * @var date $date
     *
     * @Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var text $titretemp
     *
     * @Column(name="titreTemp", type="text", nullable=false)
     */
    private $titretemp;

    /**
     * @var text $textetemp
     *
     * @Column(name="texteTemp", type="text", nullable=false)
     */
    private $textetemp;

    /**
     * @var Compagnie
     *
     * @OneToOne(targetEntity="Compagnie")
     * @JoinColumns({
     *   @JoinColumn(name="idCompagnie", referencedColumnName="idCompagnie", unique=true)
     * })
     */
    private $idcompagnie;

    /**
     * @var User
     *
     * @OneToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="idUser", referencedColumnName="idUser", unique=true)
     * })
     */
    private $iduser;

    /**
     * @var Langue
     *
     * @OneToOne(targetEntity="Langue")
     * @JoinColumns({
     *   @JoinColumn(name="idLangue", referencedColumnName="id", unique=true)
     * })
     */
    private $idlangue;


    /**
     * Get idcompagnietemp
     *
     * @return integer 
     */
    public function getIdcompagnietemp()
    {
        return $this->idcompagnietemp;
    }

    /**
     * Set imagetemp
     *
     * @param text $imagetemp
     * @return Compagnietemp
     */
    public function setImagetemp($imagetemp)
    {
        $this->imagetemp = $imagetemp;
        return $this;
    }

    /**
     * Get imagetemp
     *
     * @return text 
     */
    public function getImagetemp()
    {
        return $this->imagetemp;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return Compagnietemp
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set titretemp
     *
     * @param text $titretemp
     * @return Compagnietemp
     */
    public function setTitretemp($titretemp)
    {
        $this->titretemp = $titretemp;
        return $this;
    }

    /**
     * Get titretemp
     *
     * @return text 
     */
    public function getTitretemp()
    {
        return $this->titretemp;
    }

    /**
     * Set textetemp
     *
     * @param text $textetemp
     * @return Compagnietemp
     */
    public function setTextetemp($textetemp)
    {
        $this->textetemp = $textetemp;
        return $this;
    }

    /**
     * Get textetemp
     *
     * @return text 
     */
    public function getTextetemp()
    {
        return $this->textetemp;
    }

    /**
     * Set idcompagnie
     *
     * @param Compagnie $idcompagnie
     * @return Compagnietemp
     */
    public function setIdcompagnie(\Compagnie $idcompagnie = null)
    {
        $this->idcompagnie = $idcompagnie;
        return $this;
    }

    /**
     * Get idcompagnie
     *
     * @return Compagnie 
     */
    public function getIdcompagnie()
    {
        return $this->idcompagnie;
    }

    /**
     * Set iduser
     *
     * @param User $iduser
     * @return Compagnietemp
     */
    public function setIduser(\User $iduser = null)
    {
        $this->iduser = $iduser;
        return $this;
    }

    /**
     * Get iduser
     *
     * @return User 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idlangue
     *
     * @param Langue $idlangue
     * @return Compagnietemp
     */
    public function setIdlangue(\Langue $idlangue = null)
    {
        $this->idlangue = $idlangue;
        return $this;
    }

    /**
     * Get idlangue
     *
     * @return Langue 
     */
    public function getIdlangue()
    {
        return $this->idlangue;
    }
}