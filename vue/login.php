<?php
     include('actions/users/signupAction.php');
      include('actions/users/loginAction.php')
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/headco.php');?>
<body>
<?php include('includes/navbarconect.php');?>
        
   <article>
   <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form method="POST" enctype="multipart/form-data">
                    <h1>Créer un compte</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                    <input type="text"  name="pseudo" placeholder="Nom d'utilisateur" required />
                    <input type="text"  name="lastname" placeholder="lastname" required />
                    <input type="text"  name="firstname" placeholder="firstname" required />
                    <input type="file" name="image_auteur" />
                    <input type="password"  name="password" placeholder="Mot de passe" required />
                    <button name="validate" >S'incrire</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form method="POST" enctype="multipart/form-data">
                    <h1>Se connecter</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>ou utiliser votre compte</span>
                    <input type="text"  name="pseudo" placeholder="Nom d'utilisateur">
                    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
                    <a href="#">Vous avez oublié votre mot de passe?</a>
                    <button name="validate">Connexion</button>
                    
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Content de te revoir!</h1>
                        <p>Pour rester en contact avec nous, veuillez vous connecter avec vos informations personnelles</p>
                        <button class="ghost" id="signIn">Se connecter</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Bonjour, Cher ami!</h1>
                        <p>Entrez vos données personnelles et commencez le voyage avec nous</p>
                        <button class="ghost" id="signUp">S'inscrire</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Code JavaScript-->
        <script>
            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            signUpButton.addEventListener('click', () =>
            container.classList.add('right-panel-active'));

            signInButton.addEventListener('click', () =>
            container.classList.remove('right-panel-active'));
        </script>
        
   </article>
</body>
</html>