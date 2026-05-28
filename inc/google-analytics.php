<?php
/**
 * Google Analytics 4 - Tracking Scripts
 *
 * Stream 1: Ankrom Moisan Architects, Inc. - GA4
 *   Stream URL: http://ankrommoisan.com
 *   Stream ID:  5875428212
 *   Measurement ID: G-ZXFEVGLBLN
 *
 * Stream 2: MonsterInsights
 *   Stream URL: https://ankrommoisan.com
 *   Stream ID:  14867372456
 *   Measurement ID: G-D7C1LT3M1S
 */

function ankrom_google_analytics() {
    ?>
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZXFEVGLBLN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ZXFEVGLBLN');
        gtag('config', 'G-D7C1LT3M1S');
    </script>
    <!-- End Google Analytics 4 -->
    <?php
}
add_action( 'wp_head', 'ankrom_google_analytics' );
