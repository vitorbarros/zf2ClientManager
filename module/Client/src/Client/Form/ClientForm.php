<?php
namespace Client\Form;

use VMBFormFieldsValidator\Form\FormFilter;
use Zend\Form\Form;

class ClientForm extends Form
{
    public function __construct($name = null, array $options = array())
    {
        parent::__construct('clientForm', $options);
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new FormFilter(array(
            'fieldsRequired' => array(
                'client_name' => 'Nome',
                'client_email' => 'E-mail',
                'address_name' => 'Endereço',
                'address_zipcode' => 'Cep',
                'address_city' => 'Cidade',
                'address_state' => 'Estado',
                'contact_name' => 'Contato',
                'contact_phone_1' => 'Telefone 1',
                'user_username' => 'Login',
                'user_password' => 'Senha',
                'user_password_confirm' => 'confirmar senha',
            ),
            'passwordValidator' => array(
                'password' => array(
                    'name' => 'user_password',
                    'label' => 'Senha'
                ),
                'confirmation' => array(
                    'name' => 'user_password_confirm',
                    'label' => 'Confirmar senha'
                )
            )
        )));

        //id
        $this->add(array(
            'name' => 'client_id',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'client_id'
            )
        ));

        //client_name
        $this->add(array(
            'name' => 'client_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Nome*'
            ),
            'attributes' => array(
                'id' => 'client_name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o nome'
            )
        ));

        //client_cpf
        $this->add(array(
            'name' => 'client_cpf',
            'type' => 'text',
            'options' => array(
                'label' => 'Cpf'
            ),
            'attributes' => array(
                'id' => 'client_cpf',
                'class' => 'form-control',
                'placeholder' => 'Entre com o Cpf'
            )
        ));

        //client_cnpj
        $this->add(array(
            'name' => 'client_cnpj',
            'type' => 'text',
            'options' => array(
                'label' => 'Cnpj'
            ),
            'attributes' => array(
                'id' => 'client_cnpj',
                'class' => 'form-control',
                'placeholder' => 'Entre com o Cnpj'
            )
        ));

        //client_email
        $this->add(array(
            'name' => 'client_email',
            'type' => 'text',
            'options' => array(
                'label' => 'E-mail*'
            ),
            'attributes' => array(
                'id' => 'client_email',
                'class' => 'form-control',
                'placeholder' => 'Entre com o email'
            )
        ));

        //address_name
        $this->add(array(
            'name' => 'address_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Endereço*'
            ),
            'attributes' => array(
                'id' => 'address_name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o endereço'
            )
        ));

        //address_zipcode
        $this->add(array(
            'name' => 'address_zipcode',
            'type' => 'text',
            'options' => array(
                'label' => 'Cep*'
            ),
            'attributes' => array(
                'id' => 'client_name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o Cep'
            )
        ));

        //address_city
        $this->add(array(
            'name' => 'address_city',
            'type' => 'text',
            'options' => array(
                'label' => 'Cidade*'
            ),
            'attributes' => array(
                'id' => 'address_city',
                'class' => 'form-control',
                'placeholder' => 'Entre com a cidade',
            )
        ));

        //address_state
        $this->add(array(
            'name' => 'address_state',
            'type' => 'text',
            'options' => array(
                'label' => 'Estado*'
            ),
            'attributes' => array(
                'id' => 'address_state',
                'class' => 'form-control',
                'placeholder' => 'Entre com o estado'
            )
        ));

        //contact_name
        $this->add(array(
            'name' => 'contact_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Contato*'
            ),
            'attributes' => array(
                'id' => 'contact_name',
                'class' => 'form-control',
                'placeholder' => 'Entre com o contato'
            )
        ));

        //contact_phone_1
        $this->add(array(
            'name' => 'contact_phone_1',
            'type' => 'text',
            'options' => array(
                'label' => 'Telefone 1*'
            ),
            'attributes' => array(
                'id' => 'contact_phone_1',
                'class' => 'form-control',
                'placeholder' => 'Entre com o telefone'
            )
        ));

        //contact_phone_2
        $this->add(array(
            'name' => 'contact_phone_2',
            'type' => 'text',
            'options' => array(
                'label' => 'Telefone 2'
            ),
            'attributes' => array(
                'id' => 'contact_phone_2',
                'class' => 'form-control',
                'placeholder' => 'Entre com o telefone'
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
            'type' => 'Csrf',
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