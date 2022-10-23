<?php
/**
 * Curso
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

 /**
 * Description of Curso
 *
 * @author Ronaldo
 */

class Curso extends TRecord
{
    const TABLENAME = 'curso';
    const PRIMARYKEY= 'curso_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('curso_nome');
        parent::addAttribute('curso_carga_hs');
    }
}
