<?php



use Doctrine\Mapping as ORM;

/**
 * Mdpsalt
 *
 * @Table(name="mdpsalt")
 * @Entity
 */
class Mdpsalt
{
    /**
     * @var integer $idmdpsalt
     *
     * @Column(name="idMdpSalt", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idmdpsalt;

    /**
     * @var text $saltr
     *
     * @Column(name="saltR", type="text", nullable=false)
     */
    private $saltr;

    /**
     * @var text $saltl
     *
     * @Column(name="saltL", type="text", nullable=false)
     */
    private $saltl;


    /**
     * Get idmdpsalt
     *
     * @return integer 
     */
    public function getIdmdpsalt()
    {
        return $this->idmdpsalt;
    }

    /**
     * Set saltr
     *
     * @param text $saltr
     * @return Mdpsalt
     */
    public function setSaltr($saltr)
    {
        $this->saltr = $saltr;
        return $this;
    }

    /**
     * Get saltr
     *
     * @return text 
     */
    public function getSaltr()
    {
        return $this->saltr;
    }

    /**
     * Set saltl
     *
     * @param text $saltl
     * @return Mdpsalt
     */
    public function setSaltl($saltl)
    {
        $this->saltl = $saltl;
        return $this;
    }

    /**
     * Get saltl
     *
     * @return text 
     */
    public function getSaltl()
    {
        return $this->saltl;
    }
}