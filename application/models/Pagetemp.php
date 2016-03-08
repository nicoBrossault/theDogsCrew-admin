<?php



use Doctrine\Mapping as ORM;

/**
 * Pagetemp
 *
 * @Table(name="pagetemp")
 * @Entity
 */
class Pagetemp
{
    /**
     * @var integer $idpagetemp
     *
     * @Column(name="idPageTemp", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idpagetemp;

    /**
     * @var integer $idpage
     *
     * @Column(name="idPage", type="integer", nullable=false)
     */
    private $idpage;

    /**
     * @var integer $idlanguetemp
     *
     * @Column(name="idLangueTemp", type="integer", nullable=false)
     */
    private $idlanguetemp;

    /**
     * @var integer $idusertemp
     *
     * @Column(name="idUserTemp", type="integer", nullable=false)
     */
    private $idusertemp;

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
     * @var text $titre
     *
     * @Column(name="titre", type="text", nullable=false)
     */
    private $titre;

    /**
     * @var text $texte
     *
     * @Column(name="texte", type="text", nullable=false)
     */
    private $texte;


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
     * Set idpage
     *
     * @param integer $idpage
     * @return Pagetemp
     */
    public function setIdpage($idpage)
    {
        $this->idpage = $idpage;
        return $this;
    }

    /**
     * Get idpage
     *
     * @return integer 
     */
    public function getIdpage()
    {
        return $this->idpage;
    }

    /**
     * Set idlanguetemp
     *
     * @param integer $idlanguetemp
     * @return Pagetemp
     */
    public function setIdlanguetemp($idlanguetemp)
    {
        $this->idlanguetemp = $idlanguetemp;
        return $this;
    }

    /**
     * Get idlanguetemp
     *
     * @return integer 
     */
    public function getIdlanguetemp()
    {
        return $this->idlanguetemp;
    }

    /**
     * Set idusertemp
     *
     * @param integer $idusertemp
     * @return Pagetemp
     */
    public function setIdusertemp($idusertemp)
    {
        $this->idusertemp = $idusertemp;
        return $this;
    }

    /**
     * Get idusertemp
     *
     * @return integer 
     */
    public function getIdusertemp()
    {
        return $this->idusertemp;
    }

    /**
     * Set imagetemp
     *
     * @param text $imagetemp
     * @return Pagetemp
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
     * @return Pagetemp
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
     * Set titre
     *
     * @param text $titre
     * @return Pagetemp
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get titre
     *
     * @return text 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set texte
     *
     * @param text $texte
     * @return Pagetemp
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * Get texte
     *
     * @return text 
     */
    public function getTexte()
    {
        return $this->texte;
    }
}