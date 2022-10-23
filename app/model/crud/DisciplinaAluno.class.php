<?php
/**
 * DisciplinaAluno
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

 /**
 * Description of DisciplinaAluno
 *
 * @author Ronaldo
 */

class DisciplinaAluno extends TRecord
{
    const TABLENAME = 'disciplina_aluno';
    const PRIMARYKEY= 'disc_aluno_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('disci_curso_id');
        parent::addAttribute('aluno_id');
    }
}
