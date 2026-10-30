<?php
/**
 * Practice locations: single source of truth for addresses, phones and hours,
 * plus the shortcodes that render them.
 *
 * [fc_phone_ctas]  Home CTA under the hero (one button per location).
 * [fc_locations]   Footer "FIND US HERE" block (address, phones, hours, map).
 *
 * @package FCO
 */

/**
 * Shared business details.
 *
 * @return array
 */
function fco_get_business() {
	return apply_filters(
		'fco_business',
		array(
			'name'    => 'Full Circle Orthopedics and Sports Medicine',
			'email'   => 'info@fullcircleorthopedics.com',
			'website' => 'https://www.fullcircleorthopedics.com',
		)
	);
}

/**
 * Practice locations, in display order.
 *
 * @return array
 */
function fco_get_locations() {
	return apply_filters(
		'fco_locations',
		array(
			'phoenix'     => array(
				'label'       => 'Phoenix, AZ',
				'heading'     => 'Phoenix, Arizona',
				'street'      => '4647 N 32nd St Suite B105',
				'city'        => 'Phoenix',
				'region'      => 'AZ',
				'postal_code' => '85018',
				'country'     => 'US',
				'phone'       => '602-466-9703',
				'fax'         => '602-429-8282',
				'timezone'    => 'America/Phoenix', // MST all year (no DST).
				'tz_label'    => 'MST',
				'hours'       => array(
					'Mon–Tue: 8:30am–6:30pm',
					'Wed–Fri: 8:30am–5pm',
					'Sat–Sun: Closed',
				),
				'geo'         => array( 33.50619787086137, -112.01099574476066 ),
				'map_embed'   => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13307.786512365692!2d-112.0134039!3d33.5027657!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xedb76a26c8b3fbcf!2sFull%20Circle%20Orthopedics%20and%20Sports%20Medicine!5e0!3m2!1sen!2sin!4v1674621776030!5m2!1sen!2sin',
			),
			'scarborough' => array(
				'label'       => 'Scarborough, ME',
				'heading'     => 'Scarborough, Maine',
				'street'      => '200 Professional Dr, Suite 1',
				'city'        => 'Scarborough',
				'region'      => 'ME',
				'postal_code' => '04074',
				'country'     => 'US',
				'phone'       => '207-510-8596',
				'fax'         => '207-510-8900',
				'timezone'    => 'America/New_York',
				'tz_label'    => 'ET',
				'hours'       => array(
					'Mon–Fri: 8:30am–5pm',
					'Sat–Sun: Closed',
				),
				'geo'         => null, // Pending.
				'map_embed'   => 'https://www.google.com/maps?q=200+Professional+Dr+Suite+1,+Scarborough,+ME+04074&output=embed',
			),
		)
	);
}

/**
 * "602-466-9703" → "tel:+16024669703".
 *
 * @param string $number US phone number in any format.
 * @return string
 */
function fco_phone_href( $number ) {
	return 'tel:+1' . preg_replace( '/\D/', '', $number );
}

/**
 * "602-466-9703" → "(602) 466-9703".
 *
 * @param string $number US phone number in any format.
 * @return string
 */
function fco_phone_pretty( $number ) {
	$digits = preg_replace( '/\D/', '', $number );
	if ( strlen( $digits ) !== 10 ) {
		return $number;
	}
	return sprintf( '(%s) %s-%s', substr( $digits, 0, 3 ), substr( $digits, 3, 3 ), substr( $digits, 6 ) );
}

/**
 * Home CTA: one phone button per location, city label underneath.
 *
 * @return string
 */
function fco_phone_ctas_shortcode() {
	$html = '<div class="fc-phone-ctas">';
	foreach ( fco_get_locations() as $key => $loc ) {
		$html .= sprintf(
			'<div class="fc-phone-cta fc-phone-cta--%1$s"><a href="%2$s" class="contact-number link-button">%3$s</a><span class="fc-phone-cta__city">%4$s</span></div>',
			esc_attr( $key ),
			esc_attr( fco_phone_href( $loc['phone'] ) ),
			esc_html( fco_phone_pretty( $loc['phone'] ) ),
			esc_html( $loc['label'] )
		);
	}
	$html .= '</div>';
	return $html;
}
add_shortcode( 'fc_phone_ctas', 'fco_phone_ctas_shortcode' );

/**
 * Footer block: a column per location plus the shared email/website line.
 * The widget title ("FIND US HERE") comes from the widget itself.
 *
 * @return string
 */
function fco_locations_shortcode() {
	$business = fco_get_business();

	$html = '<div class="fc-locations"><div class="fc-locations__grid">';
	foreach ( fco_get_locations() as $key => $loc ) {
		$hours = implode( '<br>', array_map( 'esc_html', $loc['hours'] ) );
		// Zero-width non-joiners keep mobile browsers from turning the fax into a tap-to-call link.
		$fax = str_replace( '-', '&#8204;-', esc_html( $loc['fax'] ) );

		$html .= '<div class="fc-location fc-location--' . esc_attr( $key ) . '">';
		$html .= '<h4 class="fc-location__title">' . esc_html( $loc['heading'] ) . '</h4>';
		$html .= '<p class="fc-location__address">' . esc_html( $business['name'] ) . '<br>'
			. esc_html( $loc['street'] ) . ',<br>'
			. esc_html( sprintf( '%s, %s %s', $loc['city'], $loc['region'], $loc['postal_code'] ) ) . '</p>';
		$html .= '<p class="fc-location__contact">Office: <a href="' . esc_attr( fco_phone_href( $loc['phone'] ) ) . '" class="contact-number">' . esc_html( $loc['phone'] ) . '</a><br>'
			. 'Fax: ' . $fax . '<br>'
			. 'Hours (' . esc_html( $loc['tz_label'] ) . '):<br>'
			. $hours . '</p>';
		$html .= sprintf(
			'<iframe class="fc-location__map" src="%1$s" title="%2$s" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>',
			esc_url( $loc['map_embed'] ),
			esc_attr( sprintf( 'Map: %s, %s', $business['name'], $loc['label'] ) )
		);
		$html .= '</div>';
	}
	$html .= '</div>';

	$html .= sprintf(
		'<p class="fc-locations__shared">Email: <a href="mailto:%1$s">%1$s</a><br><a href="%2$s">%3$s</a></p>',
		esc_attr( $business['email'] ),
		esc_url( $business['website'] ),
		esc_html( preg_replace( '#^https?://#', '', $business['website'] ) )
	);
	$html .= '</div>';
	return $html;
}
add_shortcode( 'fc_locations', 'fco_locations_shortcode' );
