<?php



use Doctrine\Mapping as ORM;

/**
 * Articletemp
 *
 * @Table(name="articletemp")
 * @Entity
 */
class Articletemp
{
    /**
     * @var integer $idarticletemp
     *
     * @Column(name="idArticleTemp", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idarticletemp;

    /**
     * @var integer $idpagetemp
     *
     * @Column(name="idPageTemp", type="integer", nullable=true)
     */
    private $idpagetemp;

    /**
     * @var date $datetemp
     *
     * @Column(name="dateTemp", type="date", nullable=false)
     */
    private $datetemp;

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
     * @var Langue
     *
     * @OneToOne(targetEntity="Langue")
     * @JoinColumns({
     *   @JoinColumn(name="idLangueTemp", referencedColumnName="id", unique=true)
     * })
     */
    private $idlanguetemp;

    /**
     * @var Article
     *
     * @OneToOne(targetEntity="Article")
     * @JoinColumns({
     *   @JoinColumn(name="idArticle", referencedColumnName="idArticle", unique=true)
     * })
     */
    private $idarticle;

    /**
     * @var User
     *
     * @OneToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="idUserTemp", referencedColumnName="idUser", unique=true)
     * })
     */
    private $idusertemp;


    /**
     * Get idarticletemp
     *
     * @return integer 
     */
    public function getIdarticletemp()
    {
        return $this->idarticletemp;
    }

    /**
     * Set idpagetemp
     *
     * @param integer $idpagetemp
     * @return Articletemp
     */
    public function setIdpagetemp($idpagetemp)
    {
        $this->idpagetemp = $idpagetemp;
        return $this;
    }

    /**
     * Get idpagetemp
     *
     * @return integer 
     */
    public function getIdpagetemp()
    {
        return $this->idpagetemp;
    }

    /**
     * Set datetemp
     *
     * @param date $datetemp
     * @return Articletemp
     */
    public function setDatetemp($datetemp)
    {
        $this->datetemp = $datetemp;
        return $this;
    }

    /**
     * Get datetemp
     *
     * @return date 
     */
    public function getDatetemp()
    {
        return $this->datetemp;
    }

    /**
     * Set titretemp
     *
     * @param text $titretemp
     * @return Articletemp
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
     * @return Articletemp
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
     * Set idlanguetemp
     *
     * @param Langue $idlanguetemp
     * @return Articletemp
     */
    public function setIdlanguetemp(\Langue $idlanguetemp = null)
    {
        $this->idlanguetemp = $idlanguetemp;
        return $this;
    }

    /**
     * Get idlanguetemp
     *
     * @return Langue 
     */
    public function getIdlanguetemp()
    {
        return $this->idlanguetemp;
    }

    /**
     * Set idarticle
     *
     * @param Article $idarticle
     * @return Articletemp
     */
    public function setIdarticle(\Article $idarticle = null)
    {
        $this->idarticle = $idarticle;
        return $this;
    }

    /**
     * Get idarticle
     *
     * @return Article 
     */
    public function getIdarticle()
    {
        return $this->idarticle;
    }

    /**
     * Set idusertemp
     *
     * @param User $idusertemp
     * @return Articletemp
     */
    public function setIdusertemp(\User $idusertemp = null)
    {
        $this->idusertemp = $idusertemp;
        return $this;
    }

    /**
     * Get idusertemp
     *
     * @return User 
     */
    public function getIdusertemp()
    {
        return $this->idusertemp;
    }
}