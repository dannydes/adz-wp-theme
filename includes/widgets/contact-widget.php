<?php

/**
 * Contact widget class.
 */
class Ecologie_Contact_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'ecologie_contact_widget',
			__( 'Contact', 'A place where to place your contact information.' ),
			array( 'description' => 'A place where to place your contact information.', )
		);
	}
	
	/**
	 * Renders widget.
	 *
	 * @access public
	 *
	 * @param array $args Widget area args.
	 * @param object $instance Widget settings.
	 */
	public function widget( $args, $instance ) {
		$address_line_1 = $instance['address_line_1'];
		$address_line_2 = $instance['address_line_2'];
		$address_line_3 = $instance['address_line_3'];
		$address_line_4 = $instance['address_line_4'];
		$phone_country_code = $instance['phone_country_code'];
		$phone = $instance['phone'];
		$email = $instance['email'];
		
		?>
		<h2 class="widgettitle">Contact Us</h2>
		<?php if ( ! empty( $address_line_1 ) ||
				! empty( $address_line_2 ) ||
				! empty( $address_line_3 ) ||
				! empty( $address_line_4 ) ): ?>
		<p>
			<i class="fa fa-map-marker"></i>
			<?php echo esc_attr( $address_line_1 ); ?>,<br>
			<?php echo esc_attr( $address_line_2 ); ?>,<br>
			<?php echo esc_attr( $address_line_3 ); ?>,<br>
			<?php echo esc_attr( $address_line_4 ); ?>.
		</p>
		<?php endif;
		
		if ( ! empty( $phone ) ): ?>
		<p>
			<a href="tel:+<?php echo esc_attr( $phone_country_code . $phone ); ?>"><i class="fa fa-phone"></i> +<?php echo esc_attr( $phone_country_code ); ?> <?php echo esc_attr( $phone ); ?></a>
		</p>
		<?php endif;
		
		if ( ! empty( $email ) ): ?>
		<p>
			<a href="mailto:<?php echo esc_attr( $email ); ?>"><i class="fa fa-envelope"></i> <?php echo esc_attr( $email ); ?></a>
		</p>
		<?php endif;
		
	}
	
	/**
	 * Renders widget settings form.
	 *
	 * @access public
	 *
	 * @param object $instance Widget settings.
	 */
	public function form( $instance ) {
		$address_line_1 = $instance['address_line_1'];
		$address_line_2 = $instance['address_line_2'];
		$address_line_3 = $instance['address_line_3'];
		$address_line_4 = $instance['address_line_4'];
		$phone_country_code = $instance['phone_country_code'];
		$phone = $instance['phone'];
		$email = $instance['email'];
		
		$country_codes = array(
			array(
				'country' => 'Afghanistan',
				'code' => '93',
			),
			array(
				'country' => 'Albania',
				'code' => '355',
			),
			array(
				'country' => 'Algeria',
				'code' => '213',
			),
			array(
				'country' => 'American Samoa',
				'code' => '1-684',
			),
			array(
				'country' => 'Andorra',
				'code' => '376',
			),
			array(
				'country' => 'Angola',
				'code' => '244',
			),
			array(
				'country' => 'Anguilla',
				'code' => '1-264',
			),
			array(
				'country' => 'Antarctica',
				'code' => '672',
			),
			array(
				'country' => 'Antigua and Barbuda',
				'code' => '1-268',
			),
			array(
				'country' => 'Argentina',
				'code' => '54',
			),
			array(
				'country' => 'Armenia',
				'code' => '374',
			),
			array(
				'country' => 'Aruba',
				'code' => '297',
			),
			array(
				'country' => 'Australia',
				'code' => '61',
			),
			array(
				'country' => 'Austria',
				'code' => '43',
			),
			array(
				'country' => 'Azerbaijan',
				'code' => '994',
			),
			array(
				'country' => 'Bahamas',
				'code' => '1-242',
			),
			array(
				'country' => 'Bahrain',
				'code' => '973',
			),
			array(
				'country' => 'Bangladesh',
				'code' => '880',
			),
			array(
				'country' => 'Barbados',
				'code' => '1-246',
			),
			array(
				'country' => 'Belarus',
				'code' => '375',
			),
			array(
				'country' => 'Belgium',
				'code' => '32',
			),
			array(
				'country' => 'Belize',
				'code' => '501',
			),
			array(
				'country' => 'Benin',
				'code' => '229',
			),
			array(
				'country' => 'Bermuda',
				'code' => '1-441',
			),
			array(
				'country' => 'Bhutan',
				'code' => '975',
			),
			array(
				'country' => 'Bolivia',
				'code' => '591',
			),
			array(
				'country' => 'Bosnia and Herzegovina',
				'code' => '387',
			),
			array(
				'country' => 'Botswana',
				'code' => '267',
			),
			array(
				'country' => 'Brazil',
				'code' => '55',
			),
			array(
				'country' => 'British Indian Ocean Territory',
				'code' => '246',
			),
			array(
				'country' => 'British Virgin Islands',
				'code' => '1-284',
			),
			array(
				'country' => 'Brunei',
				'code' => '673',
			),
			array(
				'country' => 'Bulgaria',
				'code' => '359',
			),
			array(
				'country' => 'Burkina Faso',
				'code' => '226',
			),
			array(
				'country' => 'Burundi',
				'code' => '257',
			),
			array(
				'country' => 'Cambodia',
				'code' => '855',
			),
			array(
				'country' => 'Cameroon',
				'code' => '237',
			),
			array(
				'country' => 'Canada',
				'code' => '1',
			),
			array(
				'country' => 'Cape Verde',
				'code' => '238',
			),
			array(
				'country' => 'Cayman Islands',
				'code' => '1-345',
			),
			array(
				'country' => 'Central African Republic',
				'code' => '236',
			),
			array(
				'country' => 'Chad',
				'code' => '235',
			),
			array(
				'country' => 'Chile',
				'code' => '56',
			),
			array(
				'country' => 'China',
				'code' => '86',
			),
			array(
				'country' => 'Christmas Island',
				'code' => '61',
			),
			array(
				'country' => 'Cocos Islands',
				'code' => '61',
			),
			array(
				'country' => 'Colombia',
				'code' => '57',
			),
			array(
				'country' => 'Comoros',
				'code' => '269',
			),
			array(
				'country' => 'Cook Islands',
				'code' => '682',
			),
			array(
				'country' => 'Costa Rica',
				'code' => '506',
			),
			array(
				'country' => 'Croatia',
				'code' => '385',
			),
			array(
				'country' => 'Cuba',
				'code' => '53',
			),
			array(
				'country' => 'Curacao',
				'code' => '599',
			),
			array(
				'country' => 'Cyprus',
				'code' => '357',
			),
			array(
				'country' => 'Czech Republic',
				'code' => '420',
			),
			array(
				'country' => 'Democratic Republic of the Congo',
				'code' => '243',
			),
			array(
				'country' => 'Denmark',
				'code' => '45',
			),
			array(
				'country' => 'Djibouti',
				'code' => '253',
			),
			array(
				'country' => 'Dominica',
				'code' => '1-767',
			),
			array(
				'country' => 'Dominican Republic (1-809)',
				'code' => '1-809',
			),
			array(
				'country' => 'Dominican Republic (1-829)',
				'code' => '1-829',
			),
			array(
				'country' => 'Dominican Republic (1-849)',
				'code' => '1-849',
			),
			array(
				'country' => 'East Timor',
				'code' => '670',
			),
			array(
				'country' => 'Ecuador',
				'code' => '593',
			),
			array(
				'country' => 'Egypt',
				'code' => '20',
			),
			array(
				'country' => 'El Salvador',
				'code' => '503',
			),
			array(
				'country' => 'Equatorial Guinea',
				'code' => '240',
			),
			array(
				'country' => 'Eritrea',
				'code' => '291',
			),
			array(
				'country' => 'Estonia',
				'code' => '372',
			),
			array(
				'country' => 'Ethiopia',
				'code' => '251',
			),
			array(
				'country' => 'Falkland Islands',
				'code' => '500',
			),
			array(
				'country' => 'Faroe Islands',
				'code' => '298',
			),
			array(
				'country' => 'Fiji',
				'code' => '679',
			),
			array(
				'country' => 'Finland',
				'code' => '358',
			),
			array(
				'country' => 'France',
				'code' => '33',
			),
			array(
				'country' => 'French Polynesia',
				'code' => '689',
			),
			array(
				'country' => 'Gabon',
				'code' => '241',
			),
			array(
				'country' => 'Gambia',
				'code' => '220',
			),
			array(
				'country' => 'Georgia',
				'code' => '995',
			),
			array(
				'country' => 'Germany',
				'code' => '49',
			),
			array(
				'country' => 'Ghana',
				'code' => '233',
			),
			array(
				'country' => 'Gibraltar',
				'code' => '350',
			),
			array(
				'country' => 'Greece',
				'code' => '30',
			),
			array(
				'country' => 'Greenland',
				'code' => '299',
			),
			array(
				'country' => 'Grenada',
				'code' => '1-473',
			),
			array(
				'country' => 'Guam',
				'code' => '1-671',
			),
			array(
				'country' => 'Guatemala',
				'code' => '502',
			),
			array(
				'country' => 'Guernsey',
				'code' => '44-1481',
			),
			array(
				'country' => 'Guinea',
				'code' => '224',
			),
			array(
				'country' => 'Guinea-Bissau',
				'code' => '245',
			),
			array(
				'country' => 'Guyana',
				'code' => '592',
			),
			array(
				'country' => 'Haiti',
				'code' => '509',
			),
			array(
				'country' => 'Honduras',
				'code' => '504',
			),
			array(
				'country' => 'Hong Kong',
				'code' => '852',
			),
			array(
				'country' => 'Hungary',
				'code' => '36',
			),
			array(
				'country' => 'Iceland',
				'code' => '354',
			),
			array(
				'country' => 'India',
				'code' => '91',
			),
			array(
				'country' => 'Indonesia',
				'code' => '62',
			),
			array(
				'country' => 'Iran',
				'code' => '98',
			),
			array(
				'country' => 'Iraq',
				'code' => '964',
			),
			array(
				'country' => 'Ireland',
				'code' => '353',
			),
			array(
				'country' => 'Isle of Man',
				'code' => '44-1624',
			),
			array(
				'country' => 'Israel',
				'code' => '972',
			),
			array(
				'country' => 'Italy',
				'code' => '39',
			),
			array(
				'country' => 'Ivory Coast',
				'code' => '225',
			),
			array(
				'country' => 'Jamaica',
				'code' => '1-876',
			),
			array(
				'country' => 'Japan',
				'code' => '81',
			),
			array(
				'country' => 'Jersey',
				'code' => '44-1534',
			),
			array(
				'country' => 'Jordan',
				'code' => '962',
			),
			array(
				'country' => 'Kazakhstan',
				'code' => '7',
			),
			array(
				'country' => 'Kenya',
				'code' => '254',
			),
			array(
				'country' => 'Kiribati',
				'code' => '686',
			),
			array(
				'country' => 'Kosovo',
				'code' => '383',
			),
			array(
				'country' => 'Kuwait',
				'code' => '965',
			),
			array(
				'country' => 'Kyrgyzstan',
				'code' => '996',
			),
			array(
				'country' => 'Laos',
				'code' => '856',
			),
			array(
				'country' => 'Latvia',
				'code' => '371',
			),
			array(
				'country' => 'Lebanon',
				'code' => '961',
			),
			array(
				'country' => 'Lesotho',
				'code' => '266',
			),
			array(
				'country' => 'Liberia',
				'code' => '231',
			),
			array(
				'country' => 'Libya',
				'code' => '218',
			),
			array(
				'country' => 'Liechtenstein',
				'code' => '423',
			),
			array(
				'country' => 'Lithuania',
				'code' => '370',
			),
			array(
				'country' => 'Luxembourg',
				'code' => '352',
			),
			array(
				'country' => 'Macau',
				'code' => '853',
			),
			array(
				'country' => 'Macedonia',
				'code' => '389',
			),
			array(
				'country' => 'Madagascar',
				'code' => '261',
			),
			array(
				'country' => 'Malawi',
				'code' => '265',
			),
			array(
				'country' => 'Malaysia',
				'code' => '60',
			),
			array(
				'country' => 'Maldives',
				'code' => '960',
			),
			array(
				'country' => 'Mali',
				'code' => '223',
			),
			array(
				'country' => 'Malta',
				'code' => '356',
			),
			array(
				'country' => 'Marshall Islands',
				'code' => '692',
			),
			array(
				'country' => 'Mauritania',
				'code' => '222',
			),
			array(
				'country' => 'Mauritius',
				'code' => '230',
			),
			array(
				'country' => 'Mayotte',
				'code' => '262',
			),
			array(
				'country' => 'Mexico',
				'code' => '52',
			),
			array(
				'country' => 'Micronesia',
				'code' => '691',
			),
			array(
				'country' => 'Moldova',
				'code' => '373',
			),
			array(
				'country' => 'Monaco',
				'code' => '377',
			),
			array(
				'country' => 'Mongolia',
				'code' => '976',
			),
			array(
				'country' => 'Montenegro',
				'code' => '382',
			),
			array(
				'country' => 'Montserrat',
				'code' => '1-664',
			),
			array(
				'country' => 'Morocco',
				'code' => '212',
			),
			array(
				'country' => 'Mozambique',
				'code' => '258',
			),
			array(
				'country' => 'Myanmar',
				'code' => '95',
			),
			array(
				'country' => 'Namibia',
				'code' => '264',
			),
			array(
				'country' => 'Nauru',
				'code' => '674',
			),
			array(
				'country' => 'Nepal',
				'code' => '977',
			),
			array(
				'country' => 'Netherlands',
				'code' => '31',
			),
			array(
				'country' => 'Netherlands Antilles',
				'code' => '599',
			),
			array(
				'country' => 'New Caledonia',
				'code' => '687',
			),
			array(
				'country' => 'New Zealand',
				'code' => '64',
			),
			array(
				'country' => 'Nicaragua',
				'code' => '505',
			),
			array(
				'country' => 'Niger',
				'code' => '227',
			),
			array(
				'country' => 'Nigeria',
				'code' => '234',
			),
			array(
				'country' => 'Niue',
				'code' => '683',
			),
			array(
				'country' => 'North Korea',
				'code' => '850',
			),
			array(
				'country' => 'Northern Mariana Islands',
				'code' => '1-670',
			),
			array(
				'country' => 'Norway',
				'code' => '47',
			),
			array(
				'country' => 'Oman',
				'code' => '968',
			),
			array(
				'country' => 'Pakistan',
				'code' => '92',
			),
			array(
				'country' => 'Palau',
				'code' => '680',
			),
			array(
				'country' => 'Palestine',
				'code' => '970',
			),
			array(
				'country' => 'Panama',
				'code' => '507',
			),
			array(
				'country' => 'Papua New Guinea',
				'code' => '675',
			),
			array(
				'country' => 'Paraguay',
				'code' => '595',
			),
			array(
				'country' => 'Peru',
				'code' => '51',
			),
			array(
				'country' => 'Philippines',
				'code' => '63',
			),
			array(
				'country' => 'Pitcairn',
				'code' => '64',
			),
			array(
				'country' => 'Poland',
				'code' => '48',
			),
			array(
				'country' => 'Portugal',
				'code' => '351',
			),
			array(
				'country' => 'Puerto Rico (1-787)',
				'code' => '1-787',
			),
			array(
				'country' => 'Puerto Rico (1-939)',
				'code' => '1-939',
			),
			array(
				'country' => 'Qatar',
				'code' => '974',
			),
			array(
				'country' => 'Republic of the Congo',
				'code' => '242',
			),
			array(
				'country' => 'Reunion',
				'code' => '262',
			),
			array(
				'country' => 'Romania',
				'code' => '40',
			),
			array(
				'country' => 'Russia',
				'code' => '7',
			),
			array(
				'country' => 'Rwanda',
				'code' => '250',
			),
			array(
				'country' => 'Saint Barthelemy',
				'code' => '590',
			),
			array(
				'country' => 'Saint Helena',
				'code' => '290',
			),
			array(
				'country' => 'Saint Kitts and Nevis',
				'code' => '1-869',
			),
			array(
				'country' => 'Saint Lucia',
				'code' => '1-758',
			),
			array(
				'country' => 'Saint Martin',
				'code' => '590',
			),
			array(
				'country' => 'Saint Pierre and Miquelon',
				'code' => '508',
			),
			array(
				'country' => 'Saint Vincent and the Grenadines',
				'code' => '1-784',
			),
			array(
				'country' => 'Samoa',
				'code' => '685',
			),
			array(
				'country' => 'San Marino',
				'code' => '378',
			),
			array(
				'country' => 'Sao Tome and Principe',
				'code' => '239',
			),
			array(
				'country' => 'Saudi Arabia',
				'code' => '966',
			),
			array(
				'country' => 'Senegal',
				'code' => '221',
			),
			array(
				'country' => 'Serbia',
				'code' => '381',
			),
			array(
				'country' => 'Seychelles',
				'code' => '248',
			),
			array(
				'country' => 'Sierra Leone',
				'code' => '232',
			),
			array(
				'country' => 'Singapore',
				'code' => '65',
			),
			array(
				'country' => 'Sint Maarten',
				'code' => '1-721',
			),
			array(
				'country' => 'Slovakia',
				'code' => '421',
			),
			array(
				'country' => 'Slovenia',
				'code' => '386',
			),
			array(
				'country' => 'Solomon Islands',
				'code' => '677',
			),
			array(
				'country' => 'Somalia',
				'code' => '252',
			),
			array(
				'country' => 'South Africa',
				'code' => '27',
			),
			array(
				'country' => 'South Korea',
				'code' => '82',
			),
			array(
				'country' => 'South Sudan',
				'code' => '211',
			),
			array(
				'country' => 'Spain',
				'code' => '34',
			),
			array(
				'country' => 'Sri Lanka',
				'code' => '94',
			),
			array(
				'country' => 'Sudan',
				'code' => '249',
			),
			array(
				'country' => 'Suriname',
				'code' => '597',
			),
			array(
				'country' => 'Svalbard and Jan Mayen',
				'code' => '47',
			),
			array(
				'country' => 'Swaziland',
				'code' => '268',
			),
			array(
				'country' => 'Sweden',
				'code' => '46',
			),
			array(
				'country' => 'Switzerland',
				'code' => '41',
			),
			array(
				'country' => 'Syria',
				'code' => '963',
			),
			array(
				'country' => 'Taiwan',
				'code' => '886',
			),
			array(
				'country' => 'Tajikistan',
				'code' => '992',
			),
			array(
				'country' => 'Tanzania',
				'code' => '255',
			),
			array(
				'country' => 'Thailand',
				'code' => '66',
			),
			array(
				'country' => 'Togo',
				'code' => '228',
			),
			array(
				'country' => 'Tokelau',
				'code' => '690',
			),
			array(
				'country' => 'Tonga',
				'code' => '676',
			),
			array(
				'country' => 'Trinidad and Tobago',
				'code' => '1-868',
			),
			array(
				'country' => 'Tunisia',
				'code' => '216',
			),
			array(
				'country' => 'Turkey',
				'code' => '90',
			),
			array(
				'country' => 'Turkmenistan',
				'code' => '993',
			),
			array(
				'country' => 'Turks and Caicos Islands',
				'code' => '1-649',
			),
			array(
				'country' => 'Tuvalu',
				'code' => '688',
			),
			array(
				'country' => 'U.S. Virgin Islands',
				'code' => '1-340',
			),
			array(
				'country' => 'Uganda',
				'code' => '256',
			),
			array(
				'country' => 'Ukraine',
				'code' => '380',
			),
			array(
				'country' => 'United Arab Emirates',
				'code' => '971',
			),
			array(
				'country' => 'United Kingdom',
				'code' => '44',
			),
			array(
				'country' => 'United States',
				'code' => '1',
			),
			array(
				'country' => 'Uruguay',
				'code' => '598',
			),
			array(
				'country' => 'Uzbekistan',
				'code' => '998',
			),
			array(
				'country' => 'Vanuatu',
				'code' => '678',
			),
			array(
				'country' => 'Vatican',
				'code' => '379',
			),
			array(
				'country' => 'Venezuela',
				'code' => '58',
			),
			array(
				'country' => 'Vietnam',
				'code' => '84',
			),
			array(
				'country' => 'Wallis and Futuna',
				'code' => '681',
			),
			array(
				'country' => 'Western Sahara',
				'code' => '212',
			),
			array(
				'country' => 'Yemen',
				'code' => '967',
			),
			array(
				'country' => 'Zambia',
				'code' => '260',
			),
			array(
				'country' => 'Zimbabwe',
				'code' => '263',
			),
		);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_1' ); ?>">Address Line 1</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_1' ); ?>" name="<?php echo $this->get_field_name( 'address_line_1' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_1 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_2' ); ?>">Address Line 2</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_2' ); ?>" name="<?php echo $this->get_field_name( 'address_line_2' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_2 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_3' ); ?>">Address Line 3</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_3' ); ?>" name="<?php echo $this->get_field_name( 'address_line_3' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_3 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_4' ); ?>">Address Line 4</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_4' ); ?>" name="<?php echo $this->get_field_name( 'address_line_4' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_4 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone_country_code' ); ?>">Phone Country Code</label>
			<select id="<?php echo $this->get_field_id( 'phone_country_code' ); ?>" name="<?php echo $this->get_field_name( 'phone_country_code' ); ?>" class="widefat">
			<?php foreach ( $country_codes as $code ): ?>
				<option value="<?php echo $code['code']; ?>"<?php if ( $code['code'] === $instance['phone_country_code'] ): ?> selected<?php endif; ?>><?php echo $code["country"]; ?></option>
			<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>">Phone</label>
			<input type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>"
				class="widefat" value="<?php echo esc_attr( $phone ); ?>">
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['phone'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['phone']; ?>
			</span>
			<?php endif; ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>">Email</label>
			<input type="email" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>"
				class="widefat" value="<?php echo esc_attr( $email ); ?>">
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['email'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['email']; ?>
			</span>
			<?php endif; ?>
		</p>
		<?php
		
	}
	
	/**
	 * Updates widget settings.
	 *
	 * @access public
	 *
	 * @param object $new_instance New widget settings.
	 * @param object $old_instance Old widget settings.
	 * @return string Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['errors'] = array();
		
		if ( ! empty( $new_instance['phone'] ) && is_numeric( $new_instance['phone'] ) ) {
			$instance['phone'] = strip_tags( $new_instance['phone'] );
		} elseif ( ! empty( $new_instance['phone'] ) ) {
			$instance['phone'] = $old_instance['phone'];
			$instance['errors']['phone'] = 'Phone is not a number!';
		}
		
		$instance['phone_country_code'] = ( ! empty( $new_instance['phone_country_code'] ) ? strip_tags( $new_instance['phone_country_code'] ) : '' );
		
		if ( ! empty( $new_instance['email'] ) && is_email( $new_instance['email'] ) ) {
			$instance['email'] = strip_tags( $new_instance['email'] );
		} elseif ( ! empty( $new_instance['email'] ) ) {
			$instance['email'] = $old_instance['email'];
			$instance['errors']['email'] = 'Email format incorrect!';
		}
		
		$instance['address_line_1'] = ( ! empty( $new_instance['address_line_1'] ) ? strip_tags( $new_instance['address_line_1'] ) : '' );
		$instance['address_line_2'] = ( ! empty( $new_instance['address_line_2'] ) ? strip_tags( $new_instance['address_line_2'] ) : '' );
		$instance['address_line_3'] = ( ! empty( $new_instance['address_line_3'] ) ? strip_tags( $new_instance['address_line_3'] ) : '' );
		$instance['address_line_4'] = ( ! empty( $new_instance['address_line_4'] ) ? strip_tags( $new_instance['address_line_4'] ) : '' );
		
		return $instance;
	}
}