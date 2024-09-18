        <?php
        class educadores_fisicos{
           private $edu_nome;
           private $edu_email;
           private $edu_cref;
           function getedu_nome(){return $this->edu_nome;}
           
           function setedu_nome($edu_nome){
               $this->edu_nome=$edu_nome;}        
              
           function getedu_email(){return $this->edu_email;}
           
           function setedu_email($edu_email){
               $this->edu_email=$edu_email;}        
            
          function getedu_cref(){return $this->edu_cref;}
           
          function setedu_cref($edu_cref){
               $this->edu_cref=$edu_cref;}      
              
               
                function __construct(){}
        }
        ?>
  
