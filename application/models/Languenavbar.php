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
     * @var string $texte
     *
     * @Column(name="texte", type="string", length=255, nullable=false)
     */
    private $texte;

    /**
     * @var Langue
     *
     * @OneToOne(targetEntity="Langue")
     * @JoinColumns({
     *   @JoinColumn(name="idLangue", referencedColumnName="id", unique=true)
     * })
     */
    private $idlangue;


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

    /**
     * Set idlangue
     *
     * @param Langue $idlangue
     * @return Languenavbar
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