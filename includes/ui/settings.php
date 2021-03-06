<?php

namespace Rhubarb\RedisCache\UI;

use Rhubarb\RedisCache\UI;

defined( '\\ABSPATH' ) || exit;

?>
<div id="rediscache" class="wrap">

    <h1>
        <?php esc_html_e( 'Redis Object Cache', 'redis-cache' ); ?>
    </h1>

    <div class="columns">

        <div class="content-column">

            <h2 class="nav-tab-wrapper" id="redis-tabs">
                <?php foreach ( UI::get_tabs() as $tab ) : ?>
                    <a class="nav-tab <?php echo $tab->default ? 'nav-tab-active' : ''; ?>"
                        id="<?php echo esc_attr( $tab->slug ); ?>-tab"
                        data-target="<?php echo esc_attr( $tab->target ); ?>"
                        href="#top<?php echo esc_attr( $tab->target ); ?>"
                    >
                        <?php echo esc_html( $tab->label ); ?>
                    </a>
                <?php endforeach; ?>
            </h2>

            <div class="sections">
                <?php foreach ( UI::get_tabs() as $tab ) : ?>
                    <div id="<?php echo esc_attr( $tab->slug ); ?>"
                        class="section section-<?php echo esc_attr( $tab->slug ); ?> <?php echo $tab->default ? ' active' : ''; ?>"
                    >
                        <?php include $tab->file; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="sidebar-column">

            <h6>
                <?php esc_html_e( 'Resources', 'redis-cache' ); ?>
            </h6>

            <div class="section-pro">

                <div class="card">
                    <h2 class="title">
                        Redis Cache Pro
                    </h2>
                    <p>
                        <b>A business class object cache backend.</b> Truly reliable, highly-optimized and fully customizable, with a <u>dedicated engineer</u> when you most need it.
                    </p>
                    <ul>
                        <li>Rewritten for raw performance</li>
                        <li>100% WordPress API compliant</li>
                        <li>Faster serialization and compression</li>
                        <li>Easy debugging &amp; logging</li>
                        <li>Cache analytics and preloading</li>
                        <li>Fully unit tested (100% code coverage)</li>
                        <li>Secure connections with TLS</li>
                        <li>Health checks via WordPress &amp; WP CLI</li>
                        <li>Optimized for WooCommerce, Jetpack &amp; Yoast SEO</li>
                    </ul>
                    <p>
                        <a class="button button-primary" target="_blank" rel="noopener" href="https://wprediscache.com/?utm_source=wp-plugin&amp;utm_medium=settings">
                            <?php esc_html_e( 'Learn more', 'redis-cache' ); ?>
                        </a>
                    </p>
                </div>

                <?php $isPhp7 = version_compare( phpversion(), '7.0', '>=' ); ?>
                <?php $isPhpRedis311 = version_compare( phpversion( 'redis' ), '3.1.1', '>=' ); ?>
                <?php $phpRedisInstalled = (bool) phpversion( 'redis' ); ?>

                <?php if ( $isPhp7 && $isPhpRedis311 ) : ?>

                    <p class="compatiblity">
                        <span class="dashicons dashicons-yes"></span>
                        <span><?php esc_html_e( 'Your site meets the system requirements for the Pro version.', 'redis-cache' ); ?></span>
                    </p>

                <?php else : ?>

                    <p class="compatiblity">
                        <span class="dashicons dashicons-no"></span>
                        <span><?php echo wp_kses_post( __( 'Your site <i>does not</i> meet the requirements for the Pro version:', 'redis-cache' ) ); ?></span>
                    </p>

                    <ul>
                        <?php if ( ! $isPhp7 ) : ?>
                            <li>
                                <?php printf( esc_html__( 'The current version of PHP (%s) is too old. PHP 7.0 or newer is required.', 'redis-cache' ), phpversion() ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( ! $phpRedisInstalled ) : ?>
                            <li>
                                <?php printf( esc_html__( 'The PhpRedis extension is not installed.', 'redis-cache' ), phpversion() ); ?>
                            </li>
                        <?php elseif ( ! $isPhpRedis311 ) : ?>
                            <li>
                                <?php printf( esc_html__( 'The current version of the PhpRedis extension (%s) is too old. PhpRedis 3.1.1 or newer is required.', 'redis-cache' ), phpversion( 'redis' ) ); ?>
                            </li>
                        <?php endif; ?>
                    </ul>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>
