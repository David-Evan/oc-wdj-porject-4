<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.6.19
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>
<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h3 class="tribe-events-list-event-title">
		<?php the_title() ?>
</h3>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>

			<!-- Reservation form  -->
<div class="tribe-events-reservation">
	<a class="btn btn-theme-primary btn-md" href="#">Inscription</a>
</div>

<div class="tribe-events-event-meta">
	<div class="author <?php echo esc_attr( $has_venue_address ); ?>">
		<!-- Schedule & Recurrence Details -->
		<div class="tribe-event-schedule-details">
			<?php echo tribe_events_event_schedule_details() ?>
		</div>

	</div>
</div><!-- .tribe-events-event-meta -->

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ); ?>
<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<?php echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( wpautop(get_the_content()) ), 100, '...' ) ) ); ?>
</div><!-- .tribe-events-list-event-description -->
<?php
do_action( 'tribe_events_after_the_content' );
