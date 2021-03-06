<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class MFT_Migration {

	const LOCK_NAME = 'mft_term_metas.lock';


	/**
	 * MFT_Migration constructor.
	 */
	public function __construct() {

		if ( ! self::native_table_created() ) {
			return;
		}

		if ( self::is_finished() ) {
			return;
		}

		/**
		 * Handle the possibility of not having finished the job but you need to fully return the
		 * values of the term metas.
		 */
		add_filter( 'get_term_metadata', array( __CLASS__, 'get_term_metadata' ), 10, 4 );

		if ( ! self::can_launch_next() ) {
			return;
		}

		/**
		 * Schedule the next element
		 */
		wp_schedule_single_event( time() + MINUTE_IN_SECONDS, 'mft_migrate_term_metas_batch' );
	}

	/**
	 * Handle the values between the updates
	 *
	 * @param $value
	 * @param $object_id
	 * @param $meta_key
	 * @param $single
	 *
	 * @return mixed|null
	 */
	public static function get_term_metadata( $value, $object_id, $meta_key, $single ) {
		_mft_maybe_register_taxometa_table();
		$backcompat = get_metadata( 'term_taxo', $object_id, $meta_key, $single );
		return empty( $backcompat ) ? null : $backcompat;
	}

	/**
	 * Check if the native table have been created before lauching futher actions.
	 *
	 * @return bool
	 * @author Nicolas JUEN
	 */
	public static function native_table_created() {
		// Bail if term meta table is not installed.
		if ( get_option( 'db_version' ) < 34370 ) {
			return false;
		}

		return true;
	}

	public static function is_finished() {
		/**
		 * Bootstrap terms metas migration.
		 */
		return (bool) get_option( 'finished_migrating_terms_metas', false );
	}

	public static function can_launch_next() {

		if ( ! self::native_table_created() ) {
			return false;
		}

		if ( false === (bool) get_option( 'finished_migrating_terms_metas', false ) ) {
			return false;
		}

		// Avoid rescheduling our cron.
		return false === wp_next_scheduled( 'mft_migrate_term_metas_batch' ) ? false : true;
	}
}

new MFT_Migration();