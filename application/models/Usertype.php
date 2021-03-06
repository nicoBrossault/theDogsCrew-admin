<?php



use Doctrine\Mapping as ORM;

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
     * @Column(name="idType", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idtype;

    /**
     * @var text $libelle
     *
     * @Column(name="libelle", type="text", nullable=false)
     */
    private $libelle;


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
}