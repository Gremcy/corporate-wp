<!DOCTYPE html>
<html lang="<?php echo \PS::$current_language; ?>">
<head>
    <meta charset="UTF-8">

	<title><?php $wp_title = wp_title('', false); echo $wp_title; ?></title>
    <meta name="description" content='<?php $context = PS::get_context(); echo $context['seo_description']; ?>'>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo \PS::$assets_url; ?>images/favicon.png" />
					
    <meta property="og:title" content="<?php echo $wp_title; ?>"/>					
    <meta property="og:description" content="<?php echo $context['seo_description']; ?>"/>					
    <meta property="og:type" content="website" />					
    <meta property="og:image" content="<?php echo \PS::$assets_url; ?>images/26.jpg" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-R4BM4VP65G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-R4BM4VP65G');
    </script>

	<?php /* DON'T REMOVE THIS */ ?>
	<?php wp_head(); ?>
	<?php /* END */ ?>
</head>