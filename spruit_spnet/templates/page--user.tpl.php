<?php

/**
 *  page--user.tpl.php - beta 2.0 - VAN SPOED-THEMA, NOG NIET AANGEPAST
 */
// Show a nice clean login box when logging in,.

if(!user_is_logged_in()) {
    ?>

    <div id="primary" class="content">
        <h1 class="site-title"><a href="<?php print $front_page; ?>">
                <img src="<?php print $logo ?>" alt="SP" title="Socialistische Partij" class="logo"/> SPnet</a>
        </h1>
        <?php print $messages;
        /* Always render the page content (login / new password) */
        $block = module_invoke('system', 'block_view', 'main');
        print render($block['content']);
        print render($tabs); ?>

        <?php if(current_path() == 'user' && module_exists('splogin')): ?>
        <ul class="tabs">
            <li><a href="<?php echo url('user/new'); ?>">Nieuw account aanmaken</a></li>
        </ul>
        <?php endif; ?>

    </div>
<?php } else { ?>

    <?php print render($page['super_navigatie']); ?>
    <div id="header">
        <?php    print render($page['header']);
        print render($branding); ?>
    </div>


    <?php if($page['sidebar_first']): ?>
        <div id="sidebar-left" class="sidebar">
            <?php print render($page['sidebar_first']); ?>
        </div>
    <?php endif; ?>

    <div id="primary" class="content">
        <div class="seperator">

            <h3 class="title">Gebruikersgegevens (<?=$title;?>)</h3>

        </div>
        <?php print render($page['highlight']); ?>
        <?php print render($page['help']); ?>

        <?php if(!empty($tabs['#primary']) || !empty($messages)) : ?>
            <div class="interface">
                <?php print render($tabs); ?>
                <?php print $messages; ?>
            </div>
        <?php endif; ?>

        <?php print render($title_prefix); ?>
        <?php if($title) : ?>
            <h2 class="title"><?php print $title ?></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <?php print render($page['content']); ?>

        <div id="extra"><!-- extra (IE7 div height bug) -->
            <?php print render($page['extra']); ?></div>
        <?php if($breadcrumb) {
            print $breadcrumb;
        } ?>

    </div><!-- #content -->

    <?php if($page['sidebar_second']): ?>
        <div id="sidebar-right" class="sidebar"><?php print render($page['sidebar_second']); ?></div>
    <?php endif; ?>

    <div id="footer"><?php print render($page['footer']); ?></div>

<?php } ?>