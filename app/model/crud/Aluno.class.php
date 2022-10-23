<?php
/**
 * Aluno
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

 /**
 * Description of Aluno
 *
 * @author Ronaldo
 */

class Aluno extends TRecord
{
    const TABLENAME = 'aluno';
    const PRIMARYKEY= 'pessoa_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('curso_aluno_id');
        parent::addAttribute('aluno_status');
    }
}
