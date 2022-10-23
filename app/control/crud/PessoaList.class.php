<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PessoaList
 *
 * @author Ronaldo
 */
class PessoaList extends Adianti\Base\TStandardList{
    //put your code here
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteButton;
    protected $transformCallback;
    
    public function __construct()
    {
        parent::__construct();
        
        parent::setDatabase('crud');            // defines the database
        parent::setActiveRecord('Pessoa');   // defines the active record
        parent::setDefaultOrder('pessoa_id', 'desc');         // defines the default order
        // parent::setCriteria($criteria) // define a standard filter

        parent::addFilterField('pessoa_nome', 'LIKE', 'pessoa_nome'); // filterField, operator, formField
        
         // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Pessoa');  
        $this->form->setFormTitle('Pessoas');
        
        $pessoa_nome = new TEntry('pessoa_nome');
        
        
        $this->form->addFields([new TLabel('Pessoa','#6BAACE', '11')],[$pessoa_nome], []);
        
        $this->form->setData( TSession::getValue('Pessoa_filter_data') );
        
        
        $btn = $this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction('Novo Cadastro',  new TAction(array('PessoaForm', 'onClear')), 'fa:plus green');
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        //$this->datagrid->datatable = 'true';
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(320);
        
        $column_pessoa = new TDataGridColumn('pessoa_id', 'Id', 'center', 10);
        $column_nome = new TDataGridColumn('pessoa_nome', 'Nome', 'center', 10);
        $column_cpf = new TDataGridColumn('pessoa_cpf', 'CPF', 'center', 10);
        $column_dt_nasc = new TDataGridColumn('pessoa_dt_nasc', 'Dt Nasc', 'center', 20);
        $column_fone = new TDataGridColumn('pessoa_fone', 'Fone/Cel', 'center', 20);
        $column_whatsApp = new TDataGridColumn('pessoa_whatsApp', 'Whats App', 'center', 20);
        $column_email = new TDataGridColumn('pessoa_email', 'Email', 'center', 10);

        $column_pessoa->enableAutoHide(500);
        
        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_pessoa);
        $this->datagrid->addColumn($column_nome);
        $this->datagrid->addColumn($column_cpf);
        $this->datagrid->addColumn($column_dt_nasc);
        $this->datagrid->addColumn($column_fone);
        $this->datagrid->addColumn($column_whatsApp);
        $this->datagrid->addColumn($column_email);
        
        
        $action_edit = new TDataGridAction(array('PessoaForm', 'onEdit'));
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel(_t('Edit'));
        $action_edit->setImage('far:edit blue ');
        $action_edit->setField('pessoa_id');
        $this->datagrid->addAction($action_edit);
        
        // create DELETE action
        $action_del = new TDataGridAction(array($this, 'onDelete'));
        $action_del->setButtonClass('btn btn-default');
        $action_del->setLabel(_t('Delete'));
        $action_del->setImage('far:trash-alt red ');
        $action_del->setField('pessoa_id');
        $this->datagrid->addAction($action_del);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->enableCounters();
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid)->style='overflow-x:auto';
        $panel->addFooter($this->pageNavigation);
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        parent::add($container);
    }
    
    public function onClear()
    {
        $obj = new stdClass();
       
        $this->form->clear();   
       
        TSession::setValue('Papeleta_filter_id_sub_alinea',   NULL);
        $this->form->setData($obj);
    }
    
}