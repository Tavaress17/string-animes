<div class="dropdown">
    <?php
        if (isset($_SESSION['logado'])) {//VERIFICA SE TENTOU LOGAR OU CRIAR CONTA
            if ($_SESSION['logado'] == true) {//VERIFICA SE ESTÁ LOGADO
                echo '<a href="perfil_template.php" class="loginBtn p-0 nav-link dropdown">'; 
            } else {//NÃO ESTÁ LOGADO(LOGOUT)
                echo '<a href="#" data-toggle="dropdown" aria-expanded="false" class="loginBtn p-0 nav-link dropdown">';
            }
        } else {//NÃO TENTOU CRIAR CONTA NEM LOGAR, NÃO ESTÁ LOGADO
            echo '<a href="#" data-toggle="dropdown" aria-expanded="false" class="loginBtn p-0 nav-link dropdown">';
        }
    ?>
    
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
             stroke="#7031B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="loginIcon">
            <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
            <circle cx="12" cy="10" r="3" />
            <circle cx="12" cy="12" r="10" />
        </svg>
    </a>
    
    <div class="dropdown-menu dropdown-menu-right bg-black border-purple loginMenu">
        <form method="POST" action="./php/User_Controller.php" class="px-4 py-3">
            <div class="form-outline mb-4">
                <label class="form-label text-light" for="emailLogin">Email:</label>
                <input type="email" name="email" id="emailLogin" class="form-control inputLogin text-light bg-black border-purple" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label text-light" for="senhaLogin">Senha:</label>
                <input type="password" name="senha" id="senhaLogin" class="form-control inputLogin text-light bg-black border-purple" />
            </div>
            <div class="row mb-4">
                <!--Checkbox-->
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input checkboxCustom" type="checkbox" value=""id="lembrarLogin" />
                        <label class="pl-2 form-check-label text-light" for="lembrarLogin">Lembrar-se de mim</label>
                    </div>
                </div>
                <div class="col">
                    <a class="text-green" href="#!">Esqueceu a senha?</a>
                </div>
            </div>
            <button type="submit" name="btn-login" class="btn btn-entrar text-white bg-black border-purple btn-block">Entrar</button>
        </form>
        <div class="d-flex justify-content-center bordertop-purple py-2">
            <a class="text-green" href="telaCadastro.php">Não tem uma conta? Crie uma!</a>
        </div>
    </div>
</div>
