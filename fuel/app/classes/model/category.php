<?php
class Model_Category extends Orm\Model {
    protected static $_connection = 'production';
    protected static $_table_name = 'category';
    protected static $_primary_key = array('id');

    protected static $_properties = array (
        'id',
        'code' => array (
            'data_type' => 'varchar',
            'label' => 'Category code',
            'validation' => array (
                'required',
            ),
            'form' => array (
                'type' => 'text'
            ),
        ),
        'name' => array (
            'data_type' => 'varchar',
            'label' => 'Category name',
            'validation' => array (
                'required',
            ),
            'form' => array (
                'type' => 'text'
            ),
        ),
    );

    protected static $_has_many = array(
        'books' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Book',
            'key_to' => 'category_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

    protected static $_observers = array('Orm\\Observer_Validation' => array (
        'events' => array('before_save')
    ));
}