<?php



use Doctrine\Mapping as ORM;

/**
 * Languenavbar
 *
 * @Table(name="languenavbar")
 * @Entity
 */
class Languenavbar
{
    /**
     * @var integer $idlanguenavbar
     *
     * @Column(name="idLangueNavBar", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idlanguenavbar;

    /**
     * @var integer $idlangue
     *
     * @Column(name="idLangue", type="integer", nullable=true)
     */
    private $idlangue;

    /**
     * @var string $texte
     *
     * @Column(name="texte", type="string", length=255, nullable=false)
     */
    private $texte;


    /**
     * Get idlanguenavbar
     *
     * @return integer 
     */
    public function getIdlanguenavbar()
    {
        return $this->idlanguenavbar;
    }

    /**
     * Set idlangue
     *
     * @param integer $idlangue
     * @return Languenavbar
     */
    public function setIdlangue($idlangue)
    {
        $this->idlangue = $idlangue;
        return $this;
    }

    /**
     * Get idlangue
     *
     * @return integer 
     */
    public function getIdlangue()
    {
        return $this->idlangue;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Languenavbar
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }
}