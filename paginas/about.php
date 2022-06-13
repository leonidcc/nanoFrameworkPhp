<?php
 class About  extends Context {
     private $context;
     function __construct($context){
         $this->context = $context;
         $this->context->title = "About";
     }

     public function index(){
         $html  = ($this->context->sessionExist())
            ?$this->context->create("_componentes/navLog")
            :$this->context->create("_componentes/nav");

         $html  .= $this->context->create("about");
         $html  .= $this->context->create("_componentes/footer");
         return $this->context->ret($html);
     }

}

?>
