<?php

namespace Controllers\Configuration;

use \Centreon\Core\Form;

class CommandController extends \Centreon\Core\Controller
{

    /**
     * List commands
     *
     * @method get
     * @route /configuration/command
     */
    public function listAction()
    {
        // Init template
        $di = \Centreon\Core\Di::getDefault();
        $tpl = $di->get('template');

        // Load CssFile
        $tpl->addCss('dataTables.css')
            ->addCss('dataTables.bootstrap.css')
            ->addCss('dataTables-TableTools.css');

        // Load JsFile
        $tpl->addJs('jquery.dataTables.min.js')
            ->addJs('jquery.dataTables.TableTools.min.js')
            ->addJs('bootstrap-dataTables-paging.js')
            ->addJs('jquery.dataTables.columnFilter.js');
        
        // Display page
        $tpl->display('configuration/command/list.tpl');
    }

    /**
     * 
     * @method get
     * @route /configuration/command/list
     */
    public function datatableAction()
    {
        echo \Centreon\Core\Datatable::getDatas(
            'command',
            $this->getParams('get')
        );

    }
    
    /**
     * Create a new command
     *
     * @method post
     * @route /configuration/command/create
     */
    public function createAction()
    {
        
    }

    /**
     * Update a command
     *
     *
     * @method put
     * @route /configuration/command/update
     */
    public function updateAction()
    {
        
    }
    
    /**
     * Add a command
     *
     *
     * @method get
     * @route /configuration/command/add
     */
    public function addAction()
    {
        // Init template
        $di = \Centreon\Core\Di::getDefault();
        $tpl = $di->get('template');
        
        $form = new Form('commandForm');
        $form->addText('name', _('Name'));
        $form->addTextarea('command_line', _('Commande Line'));
        $radios['list'] = array(
            array(
              'name' => 'Notification',
              'label' => 'Notification',
              'value' => '1'
            ),
            array(
                'name' => 'Check',
                'label' => 'Check',
                'value' => '2'
            ),
            array(
                'name' => 'Misc',
                'label' => 'Misc',
                'value' => '3'
            ),
            array(
                'name' => 'Discovery',
                'label' => 'Discovery',
                'value' => '4'
            ),
          
        );
        $form->addRadio('command_type', _("Command type"), 'command_type', '&nbsp;', $radios);
        $form->addCheckbox('enable_shell', _("Enable shell"));
        $form->addTextarea('argument_description', _('Argument Description'));
        $form->add('save_form', 'submit' , _("Save"), array("onClick" => "validForm();"));
        $tpl->assign('form', $form->toSmarty());
        
        // Display page
        $tpl->display('configuration/command/edit.tpl');
    }
    
    /**
     * Update a command
     *
     *
     * @method get
     * @route /configuration/command/[i:id]
     */
    public function editAction()
    {
        // Init template
        $di = \Centreon\Core\Di::getDefault();
        $tpl = $di->get('template');
        
        $form = new Form('commandForm');
        $form->addText('name', _('Name'));
        $form->addTextarea('command_line', _('Commande Line'));
        $radios['list'] = array(
            array(
              'name' => 'Notification',
              'label' => 'Notification',
              'value' => '1'
            ),
            array(
                'name' => 'Check',
                'label' => 'Check',
                'value' => '2'
            ),
            array(
                'name' => 'Misc',
                'label' => 'Misc',
                'value' => '3'
            ),
            array(
                'name' => 'Discovery',
                'label' => 'Discovery',
                'value' => '4'
            ),
          
        );
        $form->addRadio('command_type', _("Command type"), 'command_type', '&nbsp;', $radios);
        $form->addCheckbox('enable_shell', _("Enable shell"));
        $form->addTextarea('argument_description', _('Argument Description'));
        $form->add('save_form', 'submit' , _("Save"), array("onClick" => "validForm();"));
        $tpl->assign('form', $form->toSmarty());
        
        // Display page
        $tpl->display('configuration/command/edit.tpl');
    }
}
