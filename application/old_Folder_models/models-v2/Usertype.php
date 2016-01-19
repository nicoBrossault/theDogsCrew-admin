<?php



/**
 * Usertype
 *
 * @Table(name="usertype")
 * @Entity
 */
class Usertype
{
    /**
     * @var integer $idtype
     *
     * @Column(name="IDTYPE", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idtype;

    /**
     * @var text $libelle
     *
     * @Column(name="LIBELLE", type="text", nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ManyToMany(targetEntity="Droit", inversedBy="idtype")
     * @JoinTable(name="droituser",
     *   joinColumns={
     *     @JoinColumn(name="IDTYPE", referencedColumnName="IDTYPE")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="IDDROIT", referencedColumnName="IDDROIT")
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