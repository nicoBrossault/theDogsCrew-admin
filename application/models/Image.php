<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity
 */
class Image
{
    /**
     * @var integer $idimage
     *
     * @ORM\Column(name="IDIMAGE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idimage;

    /**
     * @var text $titre
     *
     * @ORM\Column(name="TITRE", type="text", nullable=false)
     */
    private $titre;

    /**
     * @var text $description
     *
     * @ORM\Column(name="DESCRIPTION", type="text", nullable=false)
     */
    private $description;

    /**
     * @var text $url
     *
     * @ORM\Column(name="URL", type="text", nullable=false)
     */
    private $url;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="IDUSER", unique=true)
     * })
     */
    private $iduser;


    /**
     * Get idimage
     *
     * @return integer 
     */
    public function getIdimage()
    {
        return $this->idimage;
    }

    /**
     * Set titre
     *
     * @param text $titre
     * @return Image
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
     * Set description
     *
     * @param text $description
     * @return Image
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url
     *
     * @param text $url
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return text 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set iduser
     *
     * @param User $iduser
     * @return Image
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