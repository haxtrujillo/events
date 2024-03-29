<?php
/**
* Visita - Events Class
*
* @file events.php
* @package visita
* @author Hafid Trujillo
* @copyright 2010-2020 Xpark Media
* @version release: 1.0.0
* @filesource  wp-content/plugins/visita/includes/events.php
* @since available since 0.1.0
*/

class VisitaEvents extends VisitaBase {

  /**
  *
  */
  protected $post_type = 'event';

  /**
  *
  */
  protected $taxonomy = 'events';

  /**
  *
  */
  protected $caldera_form_id = 'CF563eab540f9fd';

  /**
  *
  */
  private $ticketmater_key = 'WkqW7ahymoVavSl9ljqacoiG2dg4gxzJ';

  /**
  *
  */
  protected $archive_term_id = array(
    'es' => 44,
    'en' => 72,
  );

  /**
  *
  */
  protected $default_term_id = 20;

  /**
  *
  */
  protected $mute_terms_ids = array(
    'es' => array( 44 ),
    'en' => array( 72 ),
  );

  /**
   * Constructor
   *
   * @return void
   * @since 1.0.0
   */
  function __construct( ) {

    $this->position = 26;
    $this->is_home = true;
    $this->slug = __( 'event', 'visita' );
    $this->name = __( 'Events', 'visita' );
    $this->singular = __( 'Event', 'visita' );
    $this->taxonomy_slug = __( 'events', 'visita' );
    $this->taxonomy_label = __( 'Events', 'visita' );
    $this->description = __( 'Visit Las Vegas: Events, Shows, Attractions, Concerts, Nightclubs, Hotels and more in Spanish.' , 'visita');

    $this->lang = get_locale() == 'es_MX' ? 'es' : 'en';
    $this->event_data = array_replace_recursive( $this->default_data, array(
      'post_type'   => $this->post_type,
    ) );

    $this->tabs = array(
      'starts' => __( 'Date', 'visita' ),
      'name' => __( 'Name', 'visita' ),
      'price' => __( 'Price', 'visita' ),
    );

    $defaults = $this->event_data['meta_input'];
    $this->fields = array_replace_recursive( $this->fields, array(
      'title' => __( 'Event Details', 'visita' ),
      'location' => array (
        array (
          array (
            'value' => $this->post_type,
          ),
        ),
      ),
      'fields' => array(
        array(
          'key' => 'tap_general',
          'label' => __( 'General', 'visita'  ),
          'type' => 'tab',
        ),
        array(
          'key' => '_permanent',
          'name' => '_permanent',
          'type' => 'true_false',
          'message' => __( 'Permanent', 'visita' ),
        ),
        array(
          'key' => '_disable_source',
          'name' => '_disable_source',
          'type' => 'true_false',
          'message' => __( 'Disable UTM', 'visita' ),
        ),
        array(
          'key' => '_dont_sync',
          'name' => '_dont_sync',
          'type' => 'true_false',
          'message' => __( 'Don\'t Sync', 'visita' ),
        ),
        array(
          'key' => '_link',
          'name' => '_link',
          'label' => __( 'Link', 'visita' ),
          'type' => 'text',
          'formatting' => 'url',
        ),
        array(
          'key' => '_price',
          'name' => '_price',
          'type' => 'text',
          'label' => __( 'Price', 'visita' ),
        ),
        array(
          'key' => '_price_max',
          'name' => '_price_max',
          'type' => 'number',
          'label' => __( 'Max Price', 'visita' ),
          'min' => 1,
        ),
        array(
          'key' => '_currency',
          'name' => '_currency',
          'label' => __( 'Currency', 'visita' ),
          'default_value' => $defaults['_currency'],
          'type' => 'text',
        ),
        array(
          'key' => '_duration',
          'name' => '_duration',
          'type' => 'number',
          'label' => __( 'Duration (Minutes)', 'visita' ),
          'default_value' => $defaults['_duration'],
          'min' => 1,
        ),
        array(
          'key' => '_event_type',
          'name' => '_event_type',
          'type' => 'select',
          'default_value' => 'Event',
          'label' => __( 'Event Type', 'visita' ),
          'choices' => array(
            'Event' => __( 'Event', 'visita' ),
            'ComedyEvent' => __( 'Comedy', 'visita' ),
            'DanceEvent' => __( 'Dance', 'visita' ),
            'FoodEvent' => __( 'Food', 'visita' ),
            'Festival' => __( 'Festival', 'visita' ),
            'ExhibitionEvent' => __( 'Exhibition', 'visita' ),
            'MusicEvent' => __( 'Music', 'visita' ),
            'SportsEvent' => __( 'Sports', 'visita' ),
            'TheaterEvent' => __( 'Theater', 'visita' ),
            'ScreeningEvent' => __( 'Screening', 'visita' ),
            'EducationEvent' => __( 'Education', 'visita' ),
          ),
        ),
        array(
          'key' => 'tap_location',
          'label' => __( 'Location', 'visita' ),
          'type' => 'tab',
        ),
        array(
          'key' => '_location',
          'name' => '_location',
          'label' => __( 'Name', 'visita' ),
          'type' => 'text',
        ),
        array(
          'key' => '_street',
          'name' => '_street',
          'label' => __( 'Addresss', 'visita' ),
          'type' => 'text',
        ),
        array(
          'key' => '_city',
          'name' => '_city',
          'label' => __( 'City', 'visita'  ),
          'type' => 'text',
          'default_value' => $defaults['_city'],
          'formatting' => 'none',
        ),
        array(
          'key' => '_state',
          'name' => '_state',
          'label' => __( 'State', 'visita'  ),
          'type' => 'text',
          'default_value' => $defaults['_state'],
          'formatting' => 'none',
        ),
        array(
          'key' => '_zip',
          'name' => '_zip',
          'label' => __( 'Zip Code', 'visita'  ),
          'type' => 'number',
          'min' => '1',
          'max' => '99999'
        ),
        array(
          'key' => '_phone',
          'name' => '_phone',
          'label' => __( 'Phone', 'visita'  ),
          'type' => 'text',
          'formatting' => 'phone',
        ),
        array(
          'key' => 'tap_show_times',
          'label' => __( 'Show Times', 'visita' ),
          'type' => 'tab',
        ),
        array(
          'key' => '_start_end',
          'name' => '_start_end',
          'type' => 'true_false',
          'message' => __( 'Start/End Date', 'visita' ),
        ),
        array(
          'min'=> 0,
          'key' => '_times',
          'name' => '_times',
          'type' => 'repeater',
          'layout' => 'block',
          'sub_fields' => array(
            array(
              'key' => '_date',
              'name' => '_date',
              'type' => 'date_picker',
              'return_format' => 'm/d/y',
              'display_format' => 'm/d/y',
              'label' => __( 'Date', 'visita' ),
            ),
            array(
              'key' => '_time',
              'name' => '_time',
              'type' => 'time_picker',
              'display_format' => 'g:i A',
              'label' => __( 'Time', 'visita' ),
              'default_value' => $defaults['_times'][0]['_time'],
            ),
            array(
              'key' => '_availability',
              'name' => '_availability',
              'type' => 'select',
              'label' => __( 'Availability', 'visita' ),
              'default_value' => $defaults['_times'][0]['_availability'],
              'choices' => array(
                'PreSale' => __( 'Pre Sale', 'visita' ),
                'SoldOut' => __( 'Sold Out', 'visita' ),
                'InStock'	=>  __( 'In Stock', 'visita' ),
                'OutOfStock' => __( 'Out Of Stock', 'visita' ),
                'Online Only' => __( 'Online Only', 'visita' ),
                'LimitedAvailability' => __( 'Limited Availability', 'visita' ),
              ),
            ),
            array(
              'key' => '_date_link',
              'name' => '_date_link',
              'type' => 'text',
              'label' => __( 'Link', 'visita' ),
            ),
          ),
        ),
        array(
          'key' => 'tap_performers',
          'label' => __( 'Performers', 'visita' ),
          'type' => 'tab',
        ),
        array(
          'min'=> 1,
          'key' => '_performers',
          'name' => '_performers',
          'type' => 'repeater',
          'sub_fields' => array(
            array(
              'key' => '_name',
              'name' => '_name',
              'type' => 'text',
              'label' => __( 'Performer', 'visita' ),
            ),
            array(
              'key' => '_type',
              'name' => '_type',
              'type' => 'select',
              'label' => __( 'Performe Type', 'visita' ),
              'default_value' => $defaults['_performers'][0]['_type'],
              'choices' => array(
                'Person' => __( 'Person', 'visita' ),
                'SportsTeam'=> __( 'Sports Team', 'visita' ),
                'MusicGroup' => __( 'Music Group', 'visita' ),
                'DanceGroup' => __( 'Dance Group', 'visita' ),
                'TheaterGroup' => __( 'Theater Group', 'visita' ),
              )
            ),
          ),
        ),
      )
    ) );

    //crons
    add_action( 'visita_expire', array( $this, 'expire_events' ) );
    add_action( 'visita_ticketmater_import', array( $this, 'ticketmater_import' ) );

    //basics
    add_action( 'init', array( $this, 'activate' ) );
    add_action( 'init', array( $this, 'register_post_type' ) );
    add_action( 'init', array( $this, 'add_rewrite_rules' ), 200 );
    add_action( 'visita_deactivate', array( $this, 'deactivate' ) );
    add_action( 'document_title_parts', array( $this, 'title_parts' ), 200 );
    add_action( 'document_title_parts', array( $this, 'title_tax_parts' ), 250 );

    //translation
    add_filter( 'rewrite_rules_array', array( $this, 'rewrite_rules_array' ) );
    add_filter( 'relevanssi_match', array( $this, 'relevanssi_adjust_weights' ), 100 );

    //fields
    add_action( 'acf/init', array( $this, 'register_acf_fields' ) );
    add_action( 'acf/save_post', array( $this, 'save_acf_data' ), 5 );
    add_action( 'acf/save_post', array( $this, 'save_unix_time_data' ), 10 );
    add_filter( 'acf/load_value/key=_times', array( $this, 'load_repeater_values' ), 50, 3 );
    add_filter( 'acf/load_value/key=_performers', array( $this, 'load_repeater_values' ), 50, 4 );

    add_action( 'caldera_forms_entry_saved', array( $this, 'save_user_event' ), 10, 2 );

    //translation
    add_filter( "rest_{$this->taxonomy}_query", array( $this, 'rest_parameter'), 50, 2 );
    add_filter( "rest_{$this->taxonomy}_collection_params", array( $this, 'rest_collection_params') );

    if ( defined( 'DOING_AJAX' ) || defined( 'DOING_AUTOSAVE' ) ) {
      return;
    }

    if ( ! is_admin() ) {
      add_action( 'pre_get_posts', array( $this, 'sort_tax' ), 50 );
      add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );
      add_action( 'wp', array( $this, 'after_posts_selection' ), 20 );
      add_action( 'visita_before_loop', array( $this, 'sort_tabs' ), 50 );
      add_action( 'wp_footer', array( $this, 'schemaorg_breadcrumbs' ), 0 );
      add_action( 'visita_site_metatags', array( $this, 'head_metatags' ), 20 );
      add_action( 'template_redirect', array( $this, 'redirect_404' ), 20, 100 );
      add_filter( 'pll_rel_hreflang_attributes', array( $this, 'hreflang_attributes') );
      return;
    }

    add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ), 100 );
    add_action( 'visita_import_page', array( $this, 'import_json_form' ), 2 );
    add_action( 'visita_import_page', array( $this, 'import_ticketmaster_form' ), 1 );
    add_action( 'visita_import_page_before', array( $this, 'save_import_data' ), 1 );
  }

  /**
   * Deactivate
   *
   * @return void
   * @since 0.5.0
   */
  function deactivate( ) {
    wp_clear_scheduled_hook( 'visita_ticketmater_import' );
    wp_clear_scheduled_hook( 'visita_expire', array( 'lang' => 'en' ) );
    wp_clear_scheduled_hook( 'visita_expire', array( 'lang' => 'es' ) );
  }

  /**
   * Activite and save default options
   * Activite the expire cron
   *
   * @return void
   * @since 0.5.0
   */
  function activate( ) {
    if ( ! wp_next_scheduled ( 'visita_expire' )) {
      wp_schedule_event( strtotime( '4:00 AM' ), 'daily', 'visita_expire',  array( 'lang' => 'es' ) );
      wp_schedule_event( strtotime( '4:30 AM' ), 'daily', 'visita_expire',  array( 'lang' => 'en' ) );
      wp_schedule_event( strtotime( '3:00 AM' ), 'twicedaily', 'visita_ticketmater_import');
    }
  }

  /**
  *
  */
  function hreflang_attributes( $atts ) {
    $atts['es'] = str_replace("/$this->slug/", "/evento/", $atts['es']);
    $atts['en'] = str_replace("/$this->slug/", "/$this->post_type/", $atts['en']);
    return $atts;
  }

  /**
  *
  *
  * @return void
  * @since 3.0.0
  */
  function after_posts_selection( ) {
    if ( ! is_singular( $this->post_type ) ) {
      return;
    }

    add_filter( 'get_next_post_join', array( $this, 'adjacent_post_join' ), 20 );
    add_filter( 'get_next_post_sort', array( $this, 'adjacent_post_next_sort' ), 20 );
    add_filter( 'get_next_post_where', array( $this, 'adjacent_post_next_where' ), 20 );

    add_filter( 'get_previous_post_join', array( $this, 'adjacent_post_join' ), 20 );
    add_filter( 'get_previous_post_sort', array( $this, 'adjacent_post_previous_sort' ), 20 );
    add_filter( 'get_previous_post_where', array( $this, 'adjacent_post_previous_where' ), 20 );
  }

  /**
  * Sort objects by title and date
  *
  * @return string
  * @since 3.0.0
  */
  function adjacent_post_sort( $direction ) {
    return esc_sql( " ORDER BY start.meta_value $direction LIMIT 1 " );
  }

  /**
  * Sort objects by title and date
  *
  * @return string
  * @since 3.0.0
  */
  function adjacent_post_join( ) {
    global $wpdb;
    return " INNER JOIN $wpdb->postmeta start ON (p.ID = start.post_id) AND start.meta_key = '_starts' AND start.meta_value != 0 ";
  }

  /**
  * Sort objects by title and date
  *
  * @return string
  * @since 3.0.0
  */
  function adjacent_post_where( $direction ) {
    global $wpdb;

    $language = '';
    if ( function_exists( 'pll_current_language') ) {
      if ( $term_id = pll_current_language( 'term_id') ) {
        $language = $wpdb->prepare(" AND p.ID IN ( SELECT tr.object_id FROM $wpdb->term_relationships tr LEFT JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id) WHERE tt.term_id IN (%d) )", $term_id );
      }
    }

    return $wpdb->prepare(
      " WHERE start.meta_value $direction %d AND p.post_type = '%s' AND p.post_status = 'publish' AND p.ID != %d $language",
      get_post_meta( get_the_ID(), '_starts', true ),
      get_post_type( ),
      get_the_ID()
    );
  }

  /**
  *
  * @return string
  * @since 3.0.0
  */
  function sort_tax( $query ) {
    if ( ! $query->is_main_query() ) {
      return;
    }

    if ( is_post_type_archive( $this->post_type ) || is_tax( $this->taxonomy ) ) {

      $orderby = get_query_var( 'orderby' );
      $order = ( $order = get_query_var( 'order' ) ) ? $order : 'ASC';

      $query->set( 'order',  $order );
      if ( ! $orderby || $orderby == 'starts' ) {
        $query->set( 'orderby', array( '_starts' => $order ) );
        $query->set( 'meta_query', array(
          '_starts'   => array(
            'key'     => '_starts',
            'compare' => 'EXISTS',
          )
        ) );
      }

      if ( $orderby == 'price' ) {
        $key = ( $order == 'ASC' ) ? '_price' : '_price_max';
        $query->set( 'orderby', array( $key => $order ) );
        $query->set( 'meta_query', array(
          $key => array(
            'key'     => $key,
            'compare' => 'EXISTS',
            'type'    => 'DECIMAL',
          )
        ) );
      }
    }

    if ( is_tax('language') ) {
      $query->is_tax = false;
      $query->is_home = true;
      $query->is_post_type_archive = true;
      $query->set( 'post_type', 'event' );
    }

    if ( is_home() || is_post_type_archive( $this->post_type ) ) {
      $query->query_vars['tax_query'][] = array(
        'terms'    	=> $this->mute_terms_ids[$this->lang],
        'taxonomy'  => $this->taxonomy,
        'field'    	=> 'term_id',
        'operator' 	=> 'NOT IN',
      );
    }
  }

  /**
  * Return json data from url
  *
  * @return array
  * @since 0.5.0
  */
  function json_data_from_url( $url ) {
    if ( $content = @file_get_contents( $url ) ) {
      if (preg_match('/<script(.+)(type="application\/ld\+json")([^<]+)?>([\s\S]*?)<\/script>/i', $content, $matches ) ) {
        return json_decode( $matches[4] );
      }
    }
    return array();
  }

  /**
  * Save ACF fields
  *
  * @param $post_id int
  *
  * @return void
  * @since 3.0.0
  */
  function save_unix_time_data( $post_id ) {

    // only affect events
    if ( get_current_screen()->post_type !== $this->post_type ) {
      return;
    }

    // update english version from Spanish
    $tr_lang  = false;
    $dont_sync = ! empty( $_POST['acf']['_dont_sync' ] );
    $start_end = ! empty( $_POST['acf']['_start_end' ] );

    if ( ! $dont_sync && ! empty( $_POST['post_tr_lang']['en'] ) ) {
      $tr_lang = $_POST['post_tr_lang']['en'];

      foreach ( array(
        '_zip', '_city', '_street', '_location', '_phone', '_price', '_price_max', '_event_type', '_permanent'
      ) as $post_meta_key) {
        update_post_meta( $tr_lang, $post_meta_key, $_POST['acf'][$post_meta_key] );
      }
    }

    //save each field
    foreach ( $values = (array) $_POST['acf'] as $meta_key => $meta_value ) {

      $starts = $ends = false;
      if ( $meta_key == '_times' && is_array( $meta_value ) ) {

        foreach ( $meta_value as $time ) {
          $time = strtotime( "{$time['_date']} {$time['_time']}" );

          $starts = ( $time < $starts || ! $starts ) ? $time : $starts;
          $ends = ( $time >= $ends || ! $ends ) ? ( $time + ( $values['_duration'] * 60 ) ) : $ends;
        }

        // fill days
        if ( $start_end ) {
          $date_start = new DateTime();
          $date_start->setTimestamp( $starts );

          $date_ends = new DateTime();
          $date_ends->setTimestamp( $ends );

          $times = array();
          foreach (new DatePeriod( $date_start, new DateInterval('P1D'), $date_ends ) as $dt ) {
            $times[] = array(
              '_date_link' => '',
              '_date' => $dt->format('Ymd'),
              '_time' => $dt->format('H:i'),
              '_availability' => $time['_availability'],
            );
          }

          update_post_meta( $post_id, '_times',  $times );
        }

        update_post_meta( $post_id, '_ends', $ends );
        update_post_meta( $post_id, '_starts', $starts );

        if ( !$dont_sync && $tr_lang ) {
          update_post_meta( $tr_lang, '_ends', $ends );
          update_post_meta( $tr_lang, '_starts', $starts );
          update_post_meta( $tr_lang, $meta_key, $meta_value );
        }
      }

      if ( $meta_key == '_times' && empty( $meta_value ) ) {
        update_post_meta( $post_id, '_ends', '' );
        update_post_meta( $post_id, '_starts', '' );
      }
    }
  }

  /**
  * Save default event
  *
  * @return void
  * @since 3.0.0
  */
  function save_event( $event ) {

    // try to save event
    $post_id = wp_insert_post(
      $event = array_replace_recursive( $this->event_data, $event )
    );

    // post or image could not be created or downloaded, move on.
    if ( is_wp_error( $post_id ) || ! $event['image'] ) {
      return;
    }

    include_once( ABSPATH . 'wp-admin/includes/file.php' );

    if ( is_wp_error( $tmp = download_url( $event['image'] ) ) ) {
      return;
    }

    require_once( ABSPATH . '/wp-admin/includes/image.php' );
    require_once( ABSPATH . '/wp-admin/includes/media.php' );

    // generate image sizes
    $filetype   = wp_check_filetype( $tmp );
    $attach_id  = media_handle_sideload( array(
      'error'    => 0,
      'tmp_name' => $tmp,
      'size'     => filesize( $tmp ),
      'type'     => $filetype['type'],
      'name'     => basename( $event['image'] ),
    ), $post_id );

    // attach image
    set_post_thumbnail( $post_id, $attach_id );
  }

  /**
   *
   * @return array
   * @since 0.5.0
  */
  function json_import ( $json ) {

    if ( empty( $json ) ) return;

    if ( ! is_array( $json ) ) {
      $json = array( $json );
    }

    foreach( $json as $event ) {

      $end = new DateTime( @$event->endDate );
      $start = new DateTime( $event->startDate );

      $performers = array();
      if ( is_array( $event->performer ) ){

        if ( isset( $event->performer[0]->name ) )
          $event->name = $event->performer[0]->name;

        foreach ( $event->performer as $performer ) {
          $performers[] = array(
            '_name' =>  ucwords( strtolower( $performer->name ) ),
          );
        }
      }

      if ( is_array( $event->offers ) )
        $event->offers = $event->offers[0];

      $this->save_event( array(
        'post_title'         => ucwords( strtolower( $event->name ) ),
        'image'              => $event->image,
        'tax_input'          => array(
          $this->taxonomy    =>  array( $this->default_term_id )
        ),
        'meta_input'         => array(
          '_event_type'      => 'MusicEvent',
          '_location'        => ucwords( strtolower( $event->location->name ) ),
          '_street'          => $event->location->address->streetAddress,
          '_state'           => $event->location->address->addressRegion,
          '_city'            => $event->location->address->addressLocality,
          '_zip'             => $event->location->address->postalCode,
          '_ends'            => $end->format('U'),
          '_starts'          => $start->format('U'),
          '_price_max'       => $event->offers->highPrice,
          '_price'           => (isset( $event->offers->price ) ? $event->offers->price : $event->offers->lowPrice ),
          '_link'            => (isset( $event->offers->url ) ? $event->offers->url : $event->url ) ,
          '_performers'      => $performers,
          '_times'           => array( array(
            '_date'          => $start->format( 'm/d/y' ),
            '_time'          => $start->format( 'g:i A' ),
            '_availability'  => 'InStock',
          )),
          '_description'     => $this->get_description(
                                  "{$event->name} {$event->location->name}",
                                  $start->format( 'm/d/y' ),
                                  $start->format( 'g:i A' )
          ),
        )
      ) );
    }
  }

  /**
  * post exist by title
  *
  * @return void
  * @since 2.0.1
  */
  function post_exists($title) {
    global $wpdb;
    return (int) $wpdb->get_var( $wpdb->prepare(
      "SELECT ID FROM $wpdb->posts WHERE 1=1 AND post_title = %s AND post_type = %s",
      wp_unslash( sanitize_post_field( 'post_title', $title, 0, 'db' ) ),
      $this->post_type
    ) );
  }

  /**
  * Import events from ticketmaster api
  *
  * @return void
  * @since 1.0.0
  */
  function ticketmater_import( $keyword = 'latin' ) {

    $data = json_decode( file_get_contents(
      'https://app.ticketmaster.com/discovery/v2/events.json?' .
      http_build_query( array(
        'size'      => 20,
        'stateCode' => 'nv',  //city
        'apikey'    => $this->ticketmater_key,
        'keyword'   => ( empty( $keyword ) ? 'latin' : $keyword ),
      ) )
    ) );

    if ( empty( $data->_embedded->events ) ) {
      return;
    }

    foreach ( $data->_embedded->events as $event ) {

      // don't add / update already imported items
      if ( $this->get_id_by_metadata( '_event_id', $event->id ) ) {
        continue;
      }

      if ( $this->post_exists( $event->name ) ) {
        continue;
      }

      // scan images for image that will best fit the theme
      foreach( $event->images as $image ) {
        if ( $image->ratio == '16_9' && $image->width > 800 && $image->width < 1136 ) {
          $event->image = $image->url;
        }
      }

      if ( empty( $event->priceRanges ) ) {
        $event->priceRanges = array(
          (object) array(
            'min' => '',
            'max' => '',
          )
        );
      }

      $performers = array();
      if ( is_array( $event->_embedded->attractions ) ){
        foreach ( $event->_embedded->attractions as $performer ) {
          $performers[] = array(
            '_name' =>  ucwords( $performer->name ),
          );
        }
      }

      $date     = $event->dates->start->localDate;
      $time     = $event->dates->start->localTime;

      $this->save_event( array(
          'post_title'          => $event->name,
          'image'               => $event->image,
          'post_status'         => 'publish',
          'tax_input'           => array(
            $this->taxonomy    =>  array( $this->default_term_id )
          ),
          'meta_input'          => array(
            '_event_type'       => 'MusicEvent',
            '_event_id'         => $event->id,
            '_location'         => $event->_embedded->venues[0]->name,
            '_street'           => $event->_embedded->venues[0]->address->line1,
            '_state'            => $event->_embedded->venues[0]->state->stateCode,
            '_city'             => $event->_embedded->venues[0]->city->name,
            '_zip'              => $event->_embedded->venues[0]->postalCode,
            '_link'             => $event->url,
            '_price'            => $event->priceRanges[0]->min,
            '_price_max'        => $event->priceRanges[0]->max,
            '_starts'           => strtotime( "$date $time" ),
            '_ends'             => strtotime( "$date $time + 120 minutes" ),
            '_performers'       => $performers,
            '_times'            => array( array(
              '_date'           => $event->dates->start->localDate,
              '_time'           => $event->dates->start->localTime,
              '_date_link'      => '',
              '_availability'   => 'InStock',
            ) ),
            '_description'      => $this->get_description(
                                    "{$event->name} {$event->_embedded->venues[0]->name}",
                                    $event->dates->start->localDate,
                                    $event->dates->start->localTime
            ),
          ),
        )
      );
    }
  }

  /**
  * Create event from user input
  *
  * @return bool|unit
  * @since 1.0.0
  */
  function save_user_event( $entry_id, $form ) {

    if ( $form['form_id'] != $this->caldera_form_id ) {
      return;
    }

    $date     = sanitize_text_field($_POST['fld_2997934']);
    $time     = sanitize_text_field($_POST['fld_5010512']);
    $end      = sanitize_text_field($_POST['fld_7610679']);
    $title    = sanitize_text_field($_POST['fld_8453987']);
    $location = sanitize_text_field($_POST['fld_1347577']);

    $this->save_event( array(
        'post_status'     => 'pending',
        'tax_input'       => array(
          'eventos'       => $_POST['fld_5981410']
        ),
        'post_title'      => $title,
        'post_content'    => sanitize_text_field($_POST['fld_5489516']),
        'meta_input'      => array(
          '_times'        => array( array(
            '_date'       => $date,
            '_time'       => $time,
          ) ),
          '_starts'       => strtotime( "$date $time" ),
          '_ends'         => strtotime( $end ? "$date $end" : "$date $time + 120 minutes" ),
          '_location'     => sanitize_text_field($_POST['fld_1347577']),
          '_street'       => sanitize_text_field($_POST['fld_8698786']),
          '_zip'          => sanitize_text_field($_POST['fld_9899020']),
          '_price'        => sanitize_text_field($_POST['fld_598129']),
          '_price_max'    => sanitize_text_field($_POST['fld_8942633']),
          '_description'  => $this->get_description( "$title $location", $date, $time ),
        )
      )
    );
  }

  /**
  *
  *
  * @return void
  * @since 3.0.0
  */
  function import_ticketmaster_form( ) {
    printf(
      '<form class="inside" method="post">
  			<input type="hidden" name="page" value="visita-import" />
  			<input class="widefat" type="text" name="keyword" placeholder="%1$s" />
  			<p>
          <input type="submit" name="ticketmaster" class="button-primary" value="Ticketmaster" />
        </p> %2$s
  		</form>',
      esc_attr__( 'keyword..', 'visita' ),
      wp_nonce_field( 'visita-import', 'visita-import', false )
    );
  }

  /**
  *
  *
  * @return void
  * @since 3.0.0
  */
  function import_json_form( ) {
    printf(
      '<form class="inside" method="post">
        <input type="hidden" name="page" value="visita-import" />
  			<p class="mf_field_wrapper">
  				<input class="widefat" type="text" name="url" placeholder="%1$s" />
  			</p>
  			<p class="mf_field_wrapper">
  				<textarea class="widefat" name="json" rows="5" placeholder="%2$s"></textarea>
  			</p>
  			<input type="submit" name="json-import" class="button-primary" value="%3$s" /> %4$s
    	</form>',
      esc_attr__( 'site url..', 'visita' ),
      esc_attr__( 'json...', 'visita' ),
      esc_attr__( 'Events', 'visita' ),
      wp_nonce_field( 'visita-import', 'visita-import', false )
    );
  }

  /**
  * Save ACF fields
  *
  * @return void
  * @since 3.0.0
  */
  function save_import_data( ) {

    if ( isset( $_REQUEST['json-import'] ) ) {

    	$json = ( ! empty( $_REQUEST['url'] ) )
              ? $this->json_data_from_url( $_REQUEST['url'] )
              : json_decode( stripslashes( $_REQUEST['json'] ) );
      $this->json_import( $json );
    }

    if ( isset( $_REQUEST['ticketmaster'] ) ) {
    	$this->ticketmater_import( sanitize_text_field( $_REQUEST['keyword'] ) );
    }
  }

  /**
  * Expired events and delete unprocessed events
  *
  * @return void
  * @since 0.5.0
  */
  function expire_events( $lang = 'es' ) {

    switch ($lang) {
      case 'en':
        switch_to_locale('en_US');
        break;
      default:
        switch_to_locale('es_MX');
    }

    $yesterday = date_i18n( 'Ymd',
      strtotime( 'yesterday', current_time( 'timestamp' ) )
    );

    $posts = get_posts(array(
      'post_type' => $this->post_type,
      'tax_query' => array(array(
        'taxonomy'  => 'language',
        'field'    	=> 'slug',
        'terms'    	=> array( 'en' ),
        'operator' 	=> ($lang == 'es' ? 'NOT IN': 'IN'),
      )),
      'meta_query' => array(array(
		    'key' => '_times',
		    'value' => $yesterday,
        'compare' => 'LIKE'
      ))
    ));

    foreach ( $posts as $post ) {
      $times = array(); $starts = false;

      foreach( (array) get_post_meta( $post->ID, '_times', true ) as $dates ) {
        if ( $dates['_date'] > $yesterday ) {
          $time = strtotime( "{$dates['_date']} {$dates['_time']}" );
          $starts = ( $time < $starts || ! $starts ) ? $time : $starts;
          $times[] = $dates;
        }
      }

      update_post_meta( $post->ID, '_times',  $times );
      update_post_meta( $post->ID, '_starts',  $starts );

      if ( empty( $times ) ) {
        if ( get_post_meta( $post->ID, '_permanent', true ) ) {
          wp_set_object_terms( $post->ID, array( $this->archive_term_id[$this->lang] ), $this->taxonomy );
          wp_update_post(array(
            'ID'                 => $post->ID,
            'meta_input'         => array(
              '_ends'            => '',
              '_price_max'       => '',
              '_price'           => '',
              '_link'            => '',
              '_starts'          => $starts,
              '_description'     => sprintf(
                __("%s Las Vegas. Tourist guide with the best events, shows and concerts. #VisitaVegas #Vegas", 'visita'),
                get_the_title( $post->ID )
              ),
            )
          ));
        } else wp_trash_post( $post->ID );
      }
    }

    global $cache_path;
    if ( ! empty($posts) && $cache_path && defined('WPSC_CACHE_DOMAIN')) {
      wpsc_delete_url_cache('/');
      wpsc_delete_url_cache('/en/');
      wpsc_delete_url_cache('/las-vegas-espanol/');
      wpsc_delete_url_cache('/proximos-eventos-las-vegas/');
      wpsc_delete_url_cache('/eventos-las-vegas-fin-semana/');
      wpsc_delete_url_cache('/calendario-eventos-vegas-octubre/');
      prune_super_cache( $cache_path . 'supercache/' . WPSC_CACHE_DOMAIN . '/pagina/', true );
      prune_super_cache( $cache_path . 'supercache/' . WPSC_CACHE_DOMAIN . '/eventos/', true );
      prune_super_cache( $cache_path . 'supercache/' . WPSC_CACHE_DOMAIN . '/en/page/', true );
    }
  }
}
