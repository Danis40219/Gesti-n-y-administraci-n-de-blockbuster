<!-- Importar la plantilla general -->
<?= $this->extend("plantillas/panel_base") ?>

<!-- Importar los css de la plantilla-->
<?=$this->section("css")?>

<?=$this->endSection() ?>

<!-- Importar el codigo en la seccion de contenido -->
<?=$this->section("contenido")?>
<!-- <h5>Informacion dinamica</h5> -->
<?=$this->endSection() ?>

<!-- Importar los js de la plantillaa -->
<?=$this->section("js")?>

<?=$this->endSection() ?>