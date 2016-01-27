<?php



use Doctrine\Mapping as ORM;

/**
 * Image
 *
 * @Table(name="image")
 * @Entity
 */
class Image
{
    /**
     * @var integer $idimage
     *
     * @Column(name="IDIMAGE", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idimage;

    /**
     * @var text $titre
     *
     * @Column(name="TITRE", type="text", nullable=false)
     */
    private $titre;

    /**
     * @var text $description
     *
     * @Column(name="DESCRIPTION", type="text", nullable=false)
     */
    private $description;

    /**
     * @var text $url
     *
     * @Column(name="URL", type="text", nullable=false)
     */
    private $url;

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