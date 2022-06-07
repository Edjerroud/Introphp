<?php
    
        if(!empty($_POST)){

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $dateDeNaissance=$_POST['date_de_naissance'];
        $email=$_POST['e-mail'];

        $errors=[];

        if(!$nom){
        $errors['nom']='nom obligatoire';}

        if(!$prenom){
        $errors['prenom']='prénom obligatoire';}

        if(!$dateDeNaissance){
        $errors['date_de_naissance']='date de naissance obligatoire';}  
        
        if(!$email){
        $errors['email']='email obligatoire';}        

        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]='format_email_invalide';}
        
       

        $js = file_get_contents('messages.json');
        if(!$js){
            $js = [];

        }
        else {
             $js = json_decode($js,true);
        }
         $found=false;
        foreach($js as $currentemail){
        if ($email==$currentemail['email']){
            $found=true;break;
        }
        }
        if($found){
            $errors['email']='email deja enregistré';
        }
        if(!$errors){
        $js[] = ['nom'=>$nom,'prenom'=>$prenom,'dateDeNaissance'=>$dateDeNaissance,'email'=>$email];
        $js = json_encode($js) ;
        file_put_contents('messages.json',$js);
        }
    }
    include 'target.phtml';