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
     * @var integer $idmdp
     *
     * @Column(name="idMdp", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idmdp;

    /**
     * @var string $sel1
     *
     * @Column(name="sel1", type="string", length=255, nullable=false)
     */
    private $sel1;
    
    /**
     * @var string $sel2
     *
     * @Column(name="sel2", type="string", length=255, nullable=false)
     */
    private $sel2;


    /**
     * Get idMdp
     *
     * @return integer 
     */
    public function getIdMdp()
    {
        return $this->idMdp;
    }

    /**
     * Set sel1
     *
     * @param string $sel1
     * @return Mdpsalt
     */
    public function setSel1($sel1)
    {
        $this->sel1 = $sel1;
        return $this;
    }

    /**
     * Get sel1
     *
     * @return string 
     */
    public function getSel1()
    {
        return $this->sel1;
    }
    
    /**
     * Set sel2
     *
     * @param string $sel2
     * @return Mdpsalt
     */
    public function setSel2($sel2)
    {
    	$this->sel2 = $sel2;
    	return $this;
    }
    
    /**
     * Get sel2
     *
     * @return string
     */
    public function getSel2()
    {
    	return $this->sel2;
    }
}