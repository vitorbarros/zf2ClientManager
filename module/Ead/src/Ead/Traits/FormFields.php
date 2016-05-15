<?php
namespace Ead\Traits;

trait FormFields
{

    /**
     * @param array $formMessages
     * @return array
     */
    public function fields(array $formMessages)
    {
        $fields = array();

        foreach ($formMessages as $k => $v) {

            if ($k != 'csrf') {
                $fields[] = $k;
            }
        }
        return $fields;
    }
}