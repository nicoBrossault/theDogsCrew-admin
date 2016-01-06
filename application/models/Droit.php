<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Droit
 *
 * @ORM\Table(name="droit")
 * @ORM\Entity
 */
class Droit
{
    /**
     * @var integer $iddroit
     *
     * @ORM\Column(name="IDDROIT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddroit;

    /**
     * @var text $libelle
     *
     * @ORM\Column(name="LIBELLE", type="text", nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Usertype", mappedBy="iddroit")
     */
    private $idtype;

    public function __construct()
    {
        $this->idtype = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get iddroit
     *
     * @return integer 
     */
    public function getIddroit()
    {
        return $this->iddroit;
    }

    /**
     * Set libelle
     *
     * @param text $libelle
     * @return Droit
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
     * Add idtype
     *
     * @param Usertype $idtype
     * @return Droit
     */
    public function addUsertype(\Usertype $idtype)
    {
        $this->idtype[] = $idtype;
        return $this;
    }

    /**
     * Get idtype
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdtype()
    {
        return $this->idtype;
    }
}