<?php



use Doctrine\Mapping as ORM;

/**
 * Compagnie
 *
 * @Table(name="compagnie")
 * @Entity
 */
class Compagnie
{
    /**
     * @var integer $idcompgnie
     *
     * @Column(name="idCompgnie", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idcompgnie;

    /**
     * @var text $titre
     *
     * @Column(name="titre", type="text", nullable=false)
     */
    private $titre;

    /**
     * @var text $texte
     *
     * @Column(name="texte", type="text", nullable=false)
     */
    private $texte;

    /**
     * @var text $image
     *
     * @Column(name="image", type="text", nullable=false)
     */
    private $image;

    /**
     * @var integer $idlangue
     *
     * @Column(name="idlangue", type="integer", nullable=false)
     */
    private $idlangue;


    /**
     * Get idcompgnie
     *
     * @return integer 
     */
    public function getIdcompgnie()
    {
        return $this->idcompgnie;
    }

    /**
     * Set titre
     *
     * @param text $titre
     * @return Compagnie
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
     * Set texte
     *
     * @param text $texte
     * @return Compagnie
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * Get texte
     *
     * @return text 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set image
     *
     * @param text $image
     * @return Compagnie
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return text 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set idlangue
     *
     * @param integer $idlangue
     * @return Compagnie
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
}