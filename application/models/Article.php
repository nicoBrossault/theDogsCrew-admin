<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article {
    /**
     * @var integer $idarticle
     *
     * @ORM\Column(name="IDARTICLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var date $date
     *
     * @ORM\Column(name="DATE", type="date", nullable=false)
     */
    private $date;

    /**
     * @var text $titre
     *
     * @ORM\Column(name="Titre", type="text", nullable=false)
     */
    private $titre;

    /**
     * @var text $texte
     *
     * @ORM\Column(name="TEXTE", type="text", nullable=false)
     */
    private $texte;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUSER", referencedColumnName="IDUSER", unique=true)
     * })
     */
    private $iduser;

    /**
     * @var Langue
     *
     * @ORM\OneToOne(targetEntity="Langue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLangue", referencedColumnName="id", unique=true)
     * })
     */
    private $idlangue;


    /**
     * Get idarticle
     *
     * @return integer 
     */
    public function getIdarticle()
    {
        return $this->idarticle;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return Article
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
     * @return Article
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
     * @return Article
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

    /**
     * Set iduser
     *
     * @param User $iduser
     * @return Article
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
     * @return Article
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