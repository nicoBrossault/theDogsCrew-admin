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
     * @var text $controller
     *
     * @ORM\Column(name="controller", type="text", nullable=false)
     */
    private $controller;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Usertype", mappedBy="iddroit")
     */
    private $idrole;

    public function __construct()
    {
        $this->Idrole = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set controller
     *
     * @param text $controller
     * @return text
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * Get controller
     *
     * @return text 
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * Set action
     *
     * @param text $action
     * @return action
     */
    public function setAction($action)
    {
    	$this->action = $action;
    	return $this;
    }
    
    /**
     * Get controller
     *
     * @return text
     */
    public function getController()
    {
    	return $this->controller;
    }    

    /**
     * Add idrole
     *
     * @param Usertype $Idrole
     * @return Droit
     */
    public function addUsertype(\Usertype $Idrole)
    {
        $this->idrole[] = $idrole;
        return $this;
    }

    /**
     * Get idrole
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdrole()
    {
        return $this->idrole;
    }
}