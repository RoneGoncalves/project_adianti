<?php
/**
 * Pessoa
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

 /**
 * Description of Pessoa
 *
 * @author Ronaldo
 */

class Pessoa extends TRecord
{
    const TABLENAME = 'pessoa';
    const PRIMARYKEY= 'pessoa_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('pessoa_nome');
        parent::addAttribute('pessoa_cpf');
        parent::addAttribute('pessoa_dt_nasc');
        parent::addAttribute('pessoa_fone');
        parent::addAttribute('pessoa_whatsApp');
        parent::addAttribute('pessoa_email');
    }
}
