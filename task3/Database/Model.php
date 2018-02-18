<?php


class Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Model constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function fill(array $attributes){
        return $this;
    }

    /**
     * @param array $options
     */
    public static function create(array $options = []){
        
    }

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = []){
        return true;
    }

    /**
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(array $attributes = [], array $options = [])
    {
        return $this->fill($attributes)->save($options);
    }

    /**
     * 
     */
    public function delete(){
        
    }
}