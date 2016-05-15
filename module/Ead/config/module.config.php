<?php
namespace Ead;

use Ead\Controller\StudentController;
use Ead\Form\StudentForm;

return array(
    'router' => array(
        'routes' => array(
            'ead_route' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/ead[/:controller[/:action]][/:id]',
                    'defaults' => array(
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'student' => function ($sm) {
                return new StudentController(
                    $sm->getServiceLocator()->get('Doctrine\ORM\EntityManager'),
                    $sm->getServiceLocator()->get('Ead\Service\StudentService'),
                    new StudentForm()
                );
            }
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ),
            ),
        ),
    ),
//    'data-fixture' => array(
//        'Ead_fixture' => __DIR__ . '/../src/Ead/Fixture',
//    ),
);
