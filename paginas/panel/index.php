<?php
 class Panel  extends Context {
     function __construct( ){
       parent::__construct();
         $this->title = "Inicio";
         if(!$this->sessionExist()){
             header("location:/");
             die();
         }
     }
     public function index(){
         $usuario = $this->sessionUser();
         $html  = $this->create("_componentes/navLog");
         $html  .= $this->create("_componentes/title",[
             "title" => "ADMIN"
         ]);
          $html  .= $this->create("admin",[
              "name" => "General",
              "cards" => $this->getGeneralCard()
          ]);
           if($usuario->status == 1){
          $html  .= $this->create("admin",[
              "name" => "Modelo",
              "cards" => $this->getModelCard()
          ]);
        }
           if($this->sessionUserIs("ADMIN")){
               $html  .= $this->create("admin",[
                   "name" => "Administrador",
                   "cards" => $this->getAdminCard()
               ]);
           }
         $html  .= $this->create("admin");
         $html  .= $this->create("_componentes/footer");
         return $this->ret($html);
     }

     private function getGeneralCard()  {
         return [
             [
                 "img" => "@recursos/icons/user.svg",
                 "title" => "Mis datos",
                 "url" => "/panel/my"
            ],
             [
                 "img" => "@recursos/icons/cuenta.svg",
                 "title" => "Cuenta",
                 "url" => "#"
            ],
             [
                 "img" => "@recursos/icons/config.svg",
                 "title" => "Configuración",
                 "url" => "#"
            ],
        ];
     }
     private function getModelCard()  {
         return [
             [
                 "img" => "@recursos/icons/items.svg",
                 "title" => "Productos",
                 "url" => "/panel/item"
            ],
             [
                 "img" => "@recursos/icons/categoria.svg",
                 "title" => "Categorias",
                 "url" => "/panel/categoria"
            ],
             [
                 "img" => "@recursos/icons/note.svg",
                 "title" => "Pedidos",
                 "url" => "/adminPedidos"
            ]
        ];
     }
     private function getAdminCard()  {
         return [
             [
                "img" => "@recursos/icons/team.svg",
                 "title" => "Usuarios",
                 "url" => "/panel/user"
            ],
             [
                 "img" => "@recursos/icons/proba.svg",
                 "title" => "Estadisticas",
                 "url" => "/"
            ],
        ];
     }
}

?>
