<?php



use Doctrine\Mapping as ORM;

/**
 * Droit
 *
 * @Table(name="droit")
 * @Entity
 */
class Droit
{
    /**
     * @var integer $iddroit
     *
     * @Column(name="idDroit", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $iddroit;

    /**
     * @var text $controller
     *
     * @Column(name="controller", type="text", nullable=false)
     */
    private $controller;

    /**
     * @var string $action
     *
     * @Column(name="action", type="string", length=50, nullable=false)
     */
    private $action;

    /**
     * @var integer $idrole
     *
     * @Column(name="idRole", type="integer", nullable=false)
     */
    private $idrole;


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
     * @return Droit
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
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return Droit
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set idrole
     *
     * @param integer $idrole
     * @return Droit
     */
    public function setIdrole($idrole)
    {
        $this->idrole = $idrole;
        return $this;
    }

    /**
     * Get idrole
     *
     * @return integer 
     */
    public function getIdrole()
    {
        return $this->idrole;
    }
}