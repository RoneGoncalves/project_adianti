<?php
/**
 * DisciplinaCurso
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

 /**
 * Description of DisciplinaCurso
 *
 * @author Ronaldo
 */

class DisciplinaCurso extends TRecord
{
    const TABLENAME = 'disciplina_curso';
    const PRIMARYKEY= 'disci_curso_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('disciplina_id');
        parent::addAttribute('curso_id');
    }
}
