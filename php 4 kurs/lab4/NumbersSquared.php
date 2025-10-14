<?php
class NumbersSquared implements Iterator 
{
    private $start;
    private $end;
    private $current;
    
    public function __construct($start, $end) 
    {
        $this->start = $start;
        $this->end = $end;
    }
    
    public function rewind(): void 
    {
        $this->current = $this->start;
    }
    
    public function valid(): bool 
    {
        return $this->current <= $this->end;
    }
    
    public function next(): void 
    {
        $this->current++;
    }
    
    public function key(): mixed 
    {
        return $this->current;
    }
    
    public function current(): float|int 
    {
        return $this->current * $this->current;
    }
}

$obj = new NumbersSquared(3, 7);

foreach($obj as $num => $square) {
    echo "Число: $num; Квадрат: $square<br>";
}
?>
