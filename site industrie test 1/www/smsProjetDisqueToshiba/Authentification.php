<?php
/**
 * Created by Joe of ExchangeCore.com
 */
if(isset($_POST['identifiant']) && isset($_POST['mot_de_passe'])){

    $adServer = "192.168.0.179";
	
    $ldap = ldap_connect($adServer);
    $username = $_POST['identifiant'];
    $password = $_POST['mot_de_passe'];

    $ldaprdn = '192.168.0.179' . "\\" . $username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);


    if ($bind) {
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,"dc=MYDOMAIN,dc=COM",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            var_dump($info);
            echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 
        }
        @ldap_close($ldap);
    } else {
        $msg = "Invalid email address / password";
        echo $msg;
    }

}else{
?>
    <!DOCTYPE html>

<html>
    <head>
        <title>sms.html</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <style>
            #bloc_page 
            {    
		position: absolute;
                width: 900px;    
                margin: auto; 
            } 
            
            img 
            {
                position: absolute;
                max-width: 20%;
                height: auto;
				
                top: 15px;
                left: 170px;
                
               
                
            }
            
        
            .input1
            {
		position: absolute;
                border-radius: 5px; 
                width: 250px;
                height: 25px;
				top:90px;
                left: 85px;
                font-family: Arial, sans-serif;
                text-align: center;
                color: black;
                
            }
            .input2
            {
		position: absolute;
                border-radius: 5px; 
                width: 250px;
                height: 25px;
				top: 131px;
				left: 85px;
                text-align: center;
                color: black;
            
            }
            .input3
            {
		position: absolute;
                border-radius: 5px; 
                width: 250px;
                height: 25px;
		top: 190px;
		left: 89px;
                text-align: center;
                font-size: 15px;
                color: blakc;
                
                
             
            }

            .form
            {
		position: absolute;
                width: 430px;
                height: 250px;
		top: 110px;
		left: 460px;
                
                border: 1px solid rgb(1,101,201);   
                border-radius: 10px; 
                
                background-color: rgb(1,101,201);
				

            }
			
            .footer
            {
		position: absolute;
                top: 560px;
		left: 530px;
                text-align: center;
                COLOR: rgb(150,150,150);
                font-size: 14px;
            }
        </style>
        
        
    </head>
    
    <body>
        <div id="bloc_page">
    
         
            <div class="form">
			
                <img src="logo1.png"  alt="Photo de montagne" />
                    
                <form name="form_1" action="Authentification.php" methode="POST" class="formulaire">
                    <input type="text" name="identifiant" value="" placeholder="Identifiant" class="input1" /><br>
                    </br>
                    <input type="password" name="mot_de_passe" value=""  placeholder="Mot de passe" class="input2"/><br>
                    </br>
                    <input type="submit" value="Valider" name="valid" class="input3" />
                </form>
                
            </div>
            
            
            <div class="footer">
                <p>
                        © 2016 KODEKH TELECOM. All rights reserved.
                </p>
			</div>
        </div>
    </body>
</html>
<?php } ?> 