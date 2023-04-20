<?php
class vehicles{
    public $name;
    public $color;

    //metods

    function set_name($name){
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
      }
      function set_color($color){
        $this->color = $color;
    }
    function get_color() {
        return $this->color;
      }
}

$nam = new vehicles();
    
$nam->set_name("BMW");
echo $nam->get_name();
$nam->set_color("Red");
echo "<br>", $nam->get_color();
?>