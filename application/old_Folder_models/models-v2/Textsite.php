<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Textsite
 *
 * @ORM\Table(name="textsite")
 * @ORM\Entity
 */
class Textsite
{
    /**
     * @var integer $idtext
     *
     * @ORM\Column(name="idText", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtext;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string $libelle
     *
     * @ORM\Column(name="libelle", type="string", length=60, nullable=false)
     */
    private $libelle;

    /**
     * @var text $text
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

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
     * Get idtext
     *
     * @return integer 
     */
    public function getIdtext()
    {
        return $this->idtext;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Textsite
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Textsite
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set text
     *
     * @param text $text
     * @return Textsite
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set iduser
     *
     * @param User $iduser
     * @return Textsite
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
     * @return Textsite
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