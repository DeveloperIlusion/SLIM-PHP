<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container box_1620">
                <a class="navbar-brand logo_h" href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>/Uploads/logo_crochê2.png" class="img-fluid" id="logo_navbar" type="image/png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item" id="nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>">Home</a></li>
                        <li class="nav-item" id="nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Home/loja">Loja</a></li>
                        <li class="nav-item" id="nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Home/sobreNos">Sobre Nós</a>
                        <li class="nav-item" id="nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Home/blogs">Dicas</a>
                        <li class="nav-item" id="nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Home/faleConosco">Fale Conosco</a></li>
                        <?php
                        if (empty($_SESSION["usuarioNivel"])):
                        ?>
                            <li class="nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Home/login">Entrar</a></li>
                        <?php
                        elseif ($_SESSION["usuarioNivel"] == 1):
                        ?>
                            <li class="nav-item submenu dropdown offset">
                                <a href="<?= base_url() ?>Home/login" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nav-item"><?= $_SESSION["usuarioLogin"] ?></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Usuario">Menu de Usuários</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Produtos">Menu de Produtos</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Categoria">Menu de Categorias</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation"href="<?= base_url() ?>Blogs">Menu de Blogs</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation"href="<?= base_url() ?>BlogEtapas">Menu de Passo à Passo dos Blogs</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Carrinho">Carrinho</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Usuario/trocaSenha">Trocar a Senha</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Login/signOut">Sair</a></li>
                                </ul>
                            </li>
                        <?php
                        else:
                        ?>
                            <li class="nav-item submenu dropdown offset">
                                <a href="<?= base_url() ?>Home/login" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nav-item"><?= $_SESSION["usuarioLogin"] ?></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Carrinho">Carrinho</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Usuario/trocaSenha">Trocar a Senha</a></li>
                                    <li class="nav-item submenu-nav-item"><a class="nav-link nav-animation" href="<?= base_url() ?>Login/signOut">Sair</a></li>
                                </ul>
                            </li>
                        <?php
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<main>