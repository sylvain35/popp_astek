<?php
/**
 * Created by PhpStorm.
 * User: lbodiguel
 * Date: 20/11/2014
 * Time: 14:51
 */
$nodeToDisplay = array_shift($page['content']['system_main']['nodes']);

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<header id="navbar" role="banner" class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <?php if ($logo): ?>
                <a id="mainLogo" class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                </a>
            <?php endif; ?>

            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
            <div class="navbar-collapse collapse">
                <nav id="topMenu" role="navigation">
                    <?php if (!empty($primary_nav)): ?>
                        <?php print render($primary_nav); ?>
                    <?php endif; ?>
                    <?php if (!empty($secondary_nav)): ?>
                        <?php print render($secondary_nav); ?>
                    <?php endif; ?>
                    <?php if (!empty($page['navigation'])): ?>
                        <?php print render($page['navigation']); ?>
                    <?php endif; ?>
                </nav>
            </div>
        <?php endif; ?>
    </div>
    <?php //if($is_front): ?>
    <div id="landscape">
    </div>
    <?php //endif; ?>
</header>

<div class="main-container container">

    <header role="banner" id="page-header">
        <?php if (!empty($site_slogan)): ?>
            <p class="lead"><?php print $site_slogan; ?></p>
        <?php endif; ?>

        <?php print render($page['header']); ?>
    </header> <!-- /#page-header -->
    <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
    <a id="main-content"></a>
    <?php print $messages; ?>
    <div class="row">
        <section class="col-sm-9">
            <?php if (!empty($page['highlighted'])): ?>
                <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>

            <?php if (!empty($tabs)): ?>
                <?php print render($tabs); ?>
            <?php endif; ?>
            <?php if (!empty($page['help'])): ?>
                <?php print render($page['help']); ?>
            <?php endif; ?>
            <?php if (!empty($action_links)): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
            <div class="well relPosition">
                <!-- ICI le contenu principal -->
                <a class="showInBox" rel=lightbox" data-title="" data-toggle="lightbox" href="<?=file_create_url($nodeToDisplay['field_photo']['#items'][0]['uri'])?>">
                    <span title="Plein écran" class="glyphicon glyphicon-fullscreen topRight"></span>
                </a>
                <?=drupal_render($nodeToDisplay['field_photo'])?>
            </div>
        </section>

            <aside class="col-sm-3" role="complementary">
                <div class="region region-sidebar-second">
                    <div class="well">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="pull-right dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                        Exporter
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Format 1</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Format 2</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">...</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel-group marginTop" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           Série
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="field">
                                            <div class="field-label">Titre:&nbsp;</div>
                                            <?=$title?>
                                        </div>
                                         <?=drupal_render($nodeToDisplay['title'])?>
                                         <?=drupal_render($nodeToDisplay['field_date'])?>
                                         <?=drupal_render($nodeToDisplay['field_auteur'])?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Métadonnées
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <?=drupal_render($nodeToDisplay['field_editeur'])?>
                                        <?=drupal_render($nodeToDisplay['field_contributeur'])?>
                                        <?=drupal_render($nodeToDisplay['field_droits'])?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>  <!-- /#sidebar-second -->

    </div>
    <div class="row">
        <div class="col-xs-12">

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?=drupal_render($page['carousel_serie'])?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs photoTabs" role="tablist">
                    <li role="presentation" class="active"><a href="#analyse" aria-controls="analyse" role="tab" data-toggle="tab">Analyse</a></li>
                    <li role="presentation"><a href="#temoignages" aria-controls="temoignages" role="tab" data-toggle="tab">Témoignages</a></li>
                    <li role="presentation"><a href="#commentaires" aria-controls="commentaires" role="tab" data-toggle="tab">Commentaires (0)</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active highlight" id="analyse"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam posuere posuere libero et venenatis. Nullam tincidunt, odio vel euismod eleifend, augue metus molestie felis, eget faucibus augue libero sit amet dui. Nam metus nibh, fermentum at lacinia gravida, posuere at augue. Aenean eget maximus augue.</p></div>
                    <div role="tabpanel" class="tab-pane highlight" id="temoignages"><p>Nam metus nibh, fermentum at lacinia gravida, posuere at augue. Aenean eget maximus augue.</p></div>
                    <div role="tabpanel" class="tab-pane highlight" id="commentaires"><p>Consectetur adipiscing elit. Nullam posuere posuere libero et venenatis. Nullam tincidunt, odio vel euismod eleifend, augue metus molestie felis, eget faucibus augue libero sit amet dui. Nam metus nibh, fermentum at lacinia gravida, posuere at augue. Aenean eget maximus augue.</p>
                </div>

            </div>
        </div>
    </div>
</div>
<footer class="footer container first">
    <?php print render($page['footer_top']); ?>
</footer>
<footer class="footer container">
    <div class="row">
        <div class="col-xs-2">
            <img src="/<?php print path_to_theme(); ?>/img/logo_footer.jpg" alt="<?php print t('Home'); ?>" />
        </div>
        <div class="col-xs-7">
            <?php print render($page['footer_bottom']); ?>
        </div>
        <div class="col-xs-3">
            <img src="/<?php print path_to_theme(); ?>/img/facebook.jpg" class="socialLogo" alt="Retrouvez-nous sur Facebook" title="Retrouvez-nous sur Facebook"/>
            <img src="/<?php print path_to_theme(); ?>/img/twitter.jpg" class="socialLogo" alt="Retrouvez-nous sur Twitter" title="Retrouvez-nous sur Twitter"/>
            <img src="/<?php print path_to_theme(); ?>/img/contact.jpg" class="socialLogo" alt="Contactez-nous" title="Contactez-nous"/>
        </div>
    </div>
</footer>