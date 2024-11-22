<?php
/*
  ** Cron Function Code **
*/
add_filter( 'cron_schedules', 'isa_add_every_ten_minutes' );
function isa_add_every_ten_minutes( $schedules ) {
    $schedules['every_ten_minutes'] = array(
            'interval'  => 600,
            'display'   => __( 'Every 10 Minutes', 'textdomain' )
    );
    return $schedules;
}

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'isa_add_every_ten_minutes' ) ) {
    wp_schedule_event( time(), 'every_ten_minutes', 'isa_add_every_ten_minutes' );
}

// Hook into that action that'll fire every three minutes
add_action( 'isa_add_every_ten_minutes', 'google_calendar_sync_with_partners' );
function google_calendar_sync_with_partners() {
    error_log('Cron ran successfully at ' . date('Y-m-d H:i:s'));

}
/*
  ** Cron Function Code End **
*/
