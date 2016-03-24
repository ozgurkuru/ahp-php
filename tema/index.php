<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="tema/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="tema/css/style.css" />
		<link rel="stylesheet" type="text/css" href="tema/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="index.php?page=giris" autocomplete="on" method="post"> 
                                <h1>Giriş</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Kullanıcı adı </label>
                                    <input id="username" name="kullaniciadi" required="required" type="text" placeholder="kullanıcı adı"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Şifre </label>
                                    <input id="password" name="sifre" required="required" type="password" placeholder="şifre" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input type="submit" value="Giriş" /> 
								</p>
                                
                            </form>
                        </div>

                        
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>