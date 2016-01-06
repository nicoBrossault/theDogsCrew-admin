<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity
 */
class Page
{
    /**
     * @var integer $idpage
     *
     * @ORM\Column(name="idPage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpage;

    /**
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=60, nullable=false)
     */
    private $titre;

    /**
     * @var text $texte
     *
     * @ORM\Column(name="texte", type="text", nullable=false)
     */
    private $texte;

    /**
     * @var text $image
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;

    /**
     * @var date $date
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

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
     * @var User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUSER", referencedColumnName="IDUSER", unique=true)
     * })
     */
    private $iduser;


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
     * Set titre
     *
     * @param string $titre
     * @return Page
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set texte
     *
     * @param text $texte
     * @return Page
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
     * Set image
     *
     * @param text $image
     * @return Page
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return text 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return Page
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
     * Set idlangue
     *
     * @param Langue $idlangue
     * @return Page
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

    /**
     * Set iduser
     *
     * @param User $iduser
     * @return Page
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
}