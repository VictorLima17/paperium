<div id="cadastro" class="modal">
    <form method="POST"  class="container">
        <div class="modal-content">
            <h4 class="center">Cadastrar</h4> <div class="right-align">
                <i class="material-icons modal-action modal-close ">close</i>
            </div>
            <!--form do Cadastro -->
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="email" placeholder="Insira seu email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="validate" required>
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">chat</i>
                    <input type="text" name="nome" placeholder="Insira seu nome" class="validate" required>
                    <label for="nome">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">https</i>
                    <input type="password" name="senha" placeholder="Insira sua senha" pattern=".{4,10}" class="validate" required>
                    <label for="senha" >Senha</label>
                </div>
            </div>
            <div class="center">
                <button type="submit" name="cadastro" class="btn waves-effect waves-green">Cadastrar</button>
            </div>
        </div>
        <div class="modal-footer ">

        </div>
    </form>
</div>