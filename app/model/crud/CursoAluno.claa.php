<?php
/**
 * CursoAluno
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

 /**
 * Description of CursoAluno
 *
 * @author Ronaldo
 */

class CursoAluno extends TRecord
{
    const TABLENAME = 'curso_aluno';
    const PRIMARYKEY= 'curso_aluno_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('curso_id');
        parent::addAttribute('aluno_id');
    }
}




