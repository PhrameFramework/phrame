<?php
/**
 * Part of the Phrame
 *
 * @package    Engine
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Phrame\Engine;

class Model
{
    /**
     * Data storage
     * 
     * @var  array
     */
    protected $data = array();

    /**
     * Constructs model
     * 
     * @param  array  $data  Initial data
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * Adds data to the storage
     * 
     * @param   mixed  $value  Data to store
     */
    public function add($value)
    {
        $this->data[] = $value;
    }

    /**
     * Deletes data from the storage
     * 
     * @param   array  $value  Data to delete
     */
    public function delete($value)
    {
        $key = array_search($value, $this->data);

        if ($key !== false)
        {
            unset($this->data[$key]);
        }
    }

    /**
     * Finds data from the storage
     * @param   string  $condition  Find condition
     * @return  array
     */
    public function find($condition = 'all')
    {
        $data = array();

        if ($condition === 'all')
        {
            $data = $this->data;
        }
        else
        {
            $condition_elements   = explode(' ', $condition);
            $condition_field      = array_shift($condition_elements);
            $condition_operation  = array_shift($condition_elements);
            $condition_value      = implode(' ', $condition_elements);

            foreach ($this->data as $item)
            {
                if (eval('return "'.$item[$condition_field].'"'.$condition_operation.$condition_value.';') === true)
                {
                    $data[] = $item;
                }
            }
        }

        return $data;
    }

    /**
     * Returns data count
     * 
     * @return  int
     */
    public function count()
    {
        return count($data);
    }

}
