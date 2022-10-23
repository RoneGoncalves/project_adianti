<?php
/**
 * Disciplina
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

 /**
 * Description of Disciplina
 *
 * @author Ronaldo
 */

class Disciplina extends TRecord
{
    const TABLENAME = 'disciplina';
    const PRIMARYKEY= 'disciplina_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('disciplina_nome');
        parent::addAttribute('disciplina_cod');
        parent::addAttribute('disc_carga_hs');
    }
}