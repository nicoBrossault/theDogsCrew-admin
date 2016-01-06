<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer $iduser
     *
     * @ORM\Column(name="IDUSER", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var text $nom
     *
     * @ORM\Column(name="NOM", type="text", nullable=false)
     */
    private $nom;

    /**
     * @var text $prenom
     *
     * @ORM\Column(name="PRENOM", type="text", nullable=false)
     */
    private $prenom;

    /**
     * @var text $mail
     *
     * @ORM\Column(name="MAIL", type="text", nullable=false)
     */
    private $mail;

    /**
     * @var text $mdp
     *
     * @ORM\Column(name="MDP", type="text", nullable=false)
     */
    private $mdp;

    /**
     * @var Usertype
     *
     * @ORM\OneToOne(targetEntity="Usertype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDTYPE", referencedColumnName="IDTYPE", unique=true)
     * })
     */
    private $idtype;


    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set nom
     *
     * @param text $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get nom
     *
     * @return text 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param text $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * Get prenom
     *
     * @return text 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mail
     *
     * @param text $mail
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Get mail
     *
     * @return text 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set mdp
     *
     * @param text $mdp
     * @return User
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }

    /**
     * Get mdp
     *
     * @return text 
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set idtype
     *
     * @param Usertype $idtype
     * @return User
     */
    public function setIdtype(\Usertype $idtype = null)
    {
        $this->idtype = $idtype;
        return $this;
    }

    /**
     * Get idtype
     *
     * @return Usertype 
     */
    public function getIdtype()
    {
        return $this->idtype;
    }
}