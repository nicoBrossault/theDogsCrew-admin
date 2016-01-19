<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Languenavbar
 *
 * @ORM\Table(name="languenavbar")
 * @ORM\Entity
 */
class Languenavbar
{
    /**
     * @var integer $idlanguenavbar
     *
     * @ORM\Column(name="idLangueNavBar", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlanguenavbar;

    /**
     * @var integer $idlangue
     *
     * @ORM\Column(name="idLangue", type="integer", nullable=false)
     */
    private $idlangue;

    /**
     * @var string $texte
     *
     * @ORM\Column(name="texte", type="string", length=255, nullable=false)
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