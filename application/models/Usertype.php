<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Usertype
 *
 * @ORM\Table(name="usertype")
 * @ORM\Entity
 */
class Usertype
{
    /**
     * @var integer $idtype
     *
     * @ORM\Column(name="IDTYPE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtype;

    /**
     * @var text $libelle
     *
     * @ORM\Column(name="LIBELLE", type="text", nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Droit", inversedBy="idtype")
     * @ORM\JoinTable(name="droituser",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDTYPE", referencedColumnName="IDTYPE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDDROIT", referencedColumnName="IDDROIT")
     *   }
     * )
     */
    private $iddroit;

    public function __construct()
    {
        $this->iddroit = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idtype
     *
     * @return integer 
     */
    public function getIdtype()
    {
        return $this->idtype;
    }

    /**
     * Set libelle
     *
     * @param text $libelle
     * @return Usertype
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * Get libelle
     *
     * @return text 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add iddroit
     *
     * @param Droit $iddroit
     * @return Usertype
     */
    public function addDroit(\Droit $iddroit)
    {
        $this->iddroit[] = $iddroit;
        return $this;
    }

    /**
     * Get iddroit
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIddroit()
    {
        return $this->iddroit;
    }
}