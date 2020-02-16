<?php
require_once 'pages/header.php';
require_once 'classes/anuncios.class.php';
require_once 'classes/usuarios.class.php';
$a = new Anuncios();
$u = new Usuarios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $a->getAnuncio(addslashes($_GET['id']));
} else {
    ?>
    <script>window.location.href="index.php";</script>
    <?php
    exit;
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="carousel slide" data-ride="carousel" id="meuCarousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach($info['fotos'] as $chave => $foto): ?>
                        <div class="item <?php echo ($chave == 0) ? 'active' : '' ?>">
                            <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#meuCarousel" role="button" data-slide="prev"><span><</span></a>
                <a class="right carousel-control" href="#meuCarousel" role="button" data-slide="next"><span>></span></a>
            </div>
        </div>

        <div class="col-sm-8">
            <h1><?php echo $info['titulo']; ?></h1>
            <h4><?php echo $info['categoria']; ?></h4>
            <p><?php echo $info['descricao']; ?></p>
            <br/><br/>
            <h3>R$ <?php echo number_format($info['valor'], 2); ?></h3>
            <h4>Telefone: <?php echo $info['telefone']; ?></h4>
        </div>
    </div>
</div>

<?php require_once 'pages/footer.php'; ?>