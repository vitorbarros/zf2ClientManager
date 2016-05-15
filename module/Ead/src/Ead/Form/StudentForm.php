<?php
namespace Ead\Form;

use VMBFormFieldsValidator\Form\FormFilter;
use Zend\Form\Form;

class StudentForm extends Form
{
    public function __construct($name = null, array $options = array())
    {
        parent::__construct('studentForm', $options);
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new FormFilter(array(
            'fieldsRequired' => array(
                'student_name' => 'Nome',
                'student_email' => 'E-mail',
                'user_username' => 'Login',
                'user_password' => 'Senha',
                'user_password_confirm' => 'Confirmar senha',
            ),
            'passwordValidator' => array(
                'password' => array(
                    'name' => 'user_password',
                    'label' => 'Senha'
                ),
                'confirmation' => array(
                    'name' => 'user_password_confirm',
                    'label' => 'Confirmar Senha'
                )
            )
        )));

        //id
        $this->add(array(
            'name' => 'student_id',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'student_id'
            )
        ));

        //student_name
        $this->add(array(
            'name' => 'student_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Nome*'
            ),
            'attributes' => array(
                'id' => 'student_name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o nome'
            )
        ));

        //student_email
        $this->add(array(
            'name' => 'student_email',
            'type' => 'text',
            'options' => array(
                'label' => 'E-mail'
            ),
            'attributes' => array(
                'id' => 'student_email',
                'class' => 'form-control',
                'placeholder' => 'Entre com o E-mail'
            )
        ));
        //user_username
        $this->add(array(
            'name' => 'user_username',
            'type' => 'text',
            'options' => array(
                'label' => 'Login*'
            ),
            'attributes' => array(
                'id' => 'user_username',
                'class' => 'form-control',
                'placeholder' => 'Entre com o login'
            )
        ));

        //user_password
        $this->add(array(
            'name' => 'user_password',
            'type' => 'password',
            'options' => array(
                'label' => 'Senha*'
            ),
            'attributes' => array(
                'id' => 'user_password',
                'class' => 'form-control',
                'placeholder' => 'Entre com a senha'
            )
        ));

        //user_password_confirm
        $this->add(array(
            'name' => 'user_password_confirm',
            'type' => 'password',
            'options' => array(
                'label' => 'Confirmar senha*'
            ),
            'attributes' => array(
                'id' => 'user_password_confirm',
                'class' => 'form-control',
                'placeholder' => 'Entre com a senha'
            )
        ));

        //csrf
        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));

        //button
        $this->add(array(
            'type' => 'Zend\Form\Element\Submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Cadastrar',
                'class' => 'btn btn-success'
            )
        ));
    }
}