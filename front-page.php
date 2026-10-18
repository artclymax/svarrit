<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header(null, ['class' => 'header-absolute header-overlay']) ?>
<?php get_template_part('partials/hero'); ?>
<?php get_template_part('partials/equipments'); ?>
<?php get_template_part('partials/about'); ?>
<?php get_template_part('partials/metalwork'); ?>
<?php get_template_part('partials/process'); ?>
<?php get_template_part('partials/projects'); ?>
<?php get_template_part('partials/docs'); ?>
<?php get_template_part('partials/contacts'); ?>

<?php get_footer() ?>