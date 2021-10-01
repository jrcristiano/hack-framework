<?php

namespace Dark\Collection;

trait Collection
{
    private $itens;

    public function __construct(array $itens = [])
    {
        $this->itens = $itens;
    }

    public function offsetExists($offset)
    {
        return isset($this->itens[$offset]) ?? [];
    }

    public function offsetSet($offset, $value)
    {   
        if (is_callable($value)) {
            $value = $value($this);
        }
        
        return $this->itens[$offset] = $value;
    }

    public function offsetGet($offset)
    {
        return $this->itens[$offset];
    }

    public function offsetUnset($offset)
    {
        unset($this->itens[$offset]);
    }
}
