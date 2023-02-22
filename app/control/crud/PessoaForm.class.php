<?php

use Adianti\Widget\Form\THidden;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TDate;

/**
 * PessoaForm
 *
 * @version    1.0
 * @package    model
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */


/**
 * Description of PessoaForm
 *
 * @author Ronaldo
 */
class PessoaForm extends TPage{
    //put your code here
    protected $form; // form
    protected $formFields;
    
    public function __construct()
    {
        parent::__construct();
        $this->form = new BootstrapFormBuilder('pessoa');
        // define the form title
        $this->form->setFormTitle('Cadastro');
        
        TSession::setValue('form_name','pessoa');

        $pessoa = new TEntry('pessoa_id');
        $pessoa->setEditable(FALSE);
        $nome = new TEntry('pessoa_nome');
        $cpf = new TEntry('pessoa_cpf');
        $dt_nasc = new TDate('pessoa_dt_nasc');
        $fone = new TEntry('pessoa_fone');
        $whatsApp = new TEntry('pessoa_whatsApp');
        $email = new TEntry('pessoa_email');
        $funcao = new TRadioGroup('funcao');
        $funcao->addItems(['A' => 'Aluno', 'P' => 'Professor']);
        $funcao->setUseButton();
        $funcao->setSize('80');
        $funcao->setLayout('horizontal');
        $funcao->setValue('F');

        $whatsApp->setMask('(99) 99999-9999');
        $cpf->setMask('999.999.999-99');

        $nome->addValidation('Nome', new TRequiredValidator);
        $cpf->addValidation('CPF', new TRequiredValidator);
        $dt_nasc->addValidation('Dt Nascimento', new TRequiredValidator);
        $fone->addValidation('Fone / Cel', new TRequiredValidator);
        $whatsApp->addValidation('Whats App', new TRequiredValidator);
        $nome->addValidation('Email', new TRequiredValidator);
        $funcao->addValidation('Professor ou Aluno', new TRequiredValidator);


        $this->form->addFields([new TLabel('ID','#6BAACE', '12')],[$pessoa],
                                [new TLabel('Professor ou Aluno','#6BAACE', '12')],[$funcao]);
        $this->form->addFields([new TLabel('Nome','#6BAACE', '12')],[$nome],
                                [new TLabel('CPF','#6BAACE', '12')],[$cpf]);
        $this->form->addFields([new TLabel('Dt Nascimento','#6BAACE', '12')],[$dt_nasc],
                                [new TLabel('Email','#6BAACE', '12')],[$email]);
        $this->form->addFields([new TLabel('Fone / Cel ','#6BAACE', '12')],[$fone],
                                [new TLabel('Whats App','#6BAACE', '12')],[$whatsApp]);                

        $btn = $this->form->addAction(_t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('Clear'),  new TAction(array($this, 'onClear')), 'fa:eraser red');
        $this->form->addAction(_t('Back'), new TAction(array('PessoaList', 'onClear')), 'fa:list-alt brown' );
                        
        $this->formFields = array($pessoa,$nome,$cpf,$dt_nasc,$whatsApp,$email,$fone, $funcao);     

        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml',  'PessoaList'));
        $container->add($this->form);
        
        parent::add($container);
    }

    public function onSave( $param )
    {
        try 
        {
            TTransaction::open('crud'); 

            $data = $this->form->getData(); // get form data as array

            $this->form->validate(); // validate form data
                        
            $object = new Pessoa;  // create an empty object

            $object->fromArray( (array) $data); // load the object with data
            
            $object->store();

            new TMessage('info', 'Cadastro realizado com sucesso!');

            //var_dump($object);
            TTransaction::close(); // close the transaction
        }

        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    public function onClear( $param )
    {
        $this->form->clear();

    }

    public function onEdit($param)
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open('crud'); // open a transaction

                $object = new Pessoa($key); // instantiates the Active Record
                $this->form->setData( $object );

                TTransaction::close(); // close the transaction
            }
            else
            {
                $this->form->clear(TRUE);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}