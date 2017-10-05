<?php 

/*-------------------------------------------------------------------------
  START TESTIMONIAL CPT FOR CASA
------------------------------------------------------------------------- */

$testimonial  = new Cuztom_Post_Type( 'testimonial', array(
		"label" => 'Testimonials',
		"menu_position" => 6,     
		'has_archive' => true,
		'taxonomies'          => array('post_tag' ),     
		'supports' => array('title', 'excerpt','thumbnail')
	) 
);


$testimonial->add_meta_box(

    'autorent_testimonial',
    'Testimonial Author Information',

    array(

        array(

            'name' => 'author_name',
            'label' => 'Testimonial Author Name',
            'description' => 'Put the author name here',
            'type' => 'text'

        ),

        /*array(

            'name' => 'author_address',
            'label' => 'Testimonial Author Address',
            'description' => 'Put the author address here',
            'type' => 'text'

        ),*/

        array(

            'name' => 'author_designation',
            'label' => 'Testimonial Author Desigation',
            'description' => 'Put the author designation here',
            'type' => 'text'

        ),

        array(

            'name' => 'author_company',
            'label' => 'Testimonial Author Company',
            'description' => 'Put the author company here',
            'type' => 'text',
            

        ),

        /*array(
          'name'          => 'author_rating',
          'label'         => 'Author Rating',
          'description'   => 'Enter Rating Here',
          'type'          => 'radios',
          'options'       => array(
              '1'    => '1 Rating',
              '2'    => '2 Rating',
              '3'    => '3 Rating',
              '4'    => '4 Rating',
              '5'    => '5 Rating',
          ),
          'default_value' => 'value2'
      )*/





    )
);



/*-------------------------------------------------------------------------
  END TESTIMONIAL CPT FOR CASA
------------------------------------------------------------------------- */



/*-------------------------------------------------------------------------
  START BLOCK POST TYPE
------------------------------------------------------------------------- */
  $autorent_block  = new Cuztom_Post_Type( 'block', array(
      "label" => 'Block',
      "menu_position" => 7,     
      'has_archive' => true,
      'taxonomies'          => array('post_tag' ),     
      'supports' => array('title', 'excerpt','thumbnail','editor')
     ) 
    );


  $autorent_block->add_meta_box(

      'autorent_block',
      'Block type',

      array(

          array(
            
              'name'          => 'type',
              'label'         => 'Select block type',             
              'type'          => 'select',
              'options'       => array(

                  'content_block_with_social_link'    => 'Content block With Social Link',
                  'content_block_without_social_link'    => 'Content block Without Social Link',
                  'autorent_get_stated'    => 'autorent Get Started',  
                  'tab' => 'Tab', 
                  'about_us' => 'About Us',              
                  'contact' => 'Contact Us',
                  'testimonial'    => 'Testimonial',
                  'partner'    => 'Partner',
                  'service_offer'    => 'Service Offer',
                  'service_features'    => 'Service Features',
                  'pricing'    => 'Pricing',
                  'rental_experience'    => 'Rental Experience',                  
              ),
              
           )

         
        )
    );


  $autorent_block->add_meta_box(

      'autorent_block_style',
      'Block Style',

      array(

          array(
              'name'          => 'background_color',
              'label'         => 'Background Color',
              'description'   => 'Select background color for the block',
              'type'          => 'color',
          ),
          array(
              'name'          => 'background_image',
              'label'         => 'Background Image',
              'description'   => 'Select background image for the the block',
              'type'          => 'image',
          ),

         
        )
    );

/*-------------------------------------------------------------------------
  END BLOCK POST TYPE
------------------------------------------------------------------------- */




/*-------------------------------------------------------------------------
  START DRIVER POST TYPE
------------------------------------------------------------------------- */
  /*$autorent_driver  = new Cuztom_Post_Type( 'driver', array(
        "label" => 'Driver',
        "menu_position" => 8,     
        'has_archive' => true,
        'taxonomies'          => array('post_tag' ),     
        'supports' => array('title', 'thumbnail','editor')
        ) 
    );



  $autorent_driver->add_meta_box(

      'autorent_driver',
      'Driver Biography',

      array(

          array(
              'name'          => 'name',
              'label'         => 'Name',              
              'type'          => 'text',
          ),

          array(
              'name'          => 'experience',
              'label'         => 'Year of experience',              
              'type'          => 'text',
          ),

          array(
              'name'          => 'special_training',
              'label'         => 'Special Training',              
              'type'          => 'yesno',
          ),

          array(
              'name'          => 'language',
              'label'         => 'Language',   
              'description'   => 'If driver knows multiple language put them on text box like : Spanish,English',           
              'type'          => 'text',
          ),

          array(
              'name'          => 'designation',
              'label'         => 'Designation',
              'description'   => 'Give the name of drivers holding position like Pilot or chauffeu',                         
              'type'          => 'text',
          ),

         
        )
    );*/




/*-------------------------------------------------------------------------
  END DRIVER POST TYPE
------------------------------------------------------------------------- */




/*-------------------------------------------------------------------------
  START PAGE POST TYPE
------------------------------------------------------------------------- */



  $autorent_page = new Cuztom_Post_Type( 'page');

  $args = array(

      'post_type' => 'block',
      'posts_per_page' => -1

    );

  


  $autorent_page->add_meta_box(

        'autorent_front_page',
        'Select Block Posts To Bulid Front Page',

        array(

          array(
              'name'          => 'selected_block',
              'label'         => 'Select Blocks',
              'description'   => 'Select post to organize your front pages',
              'type'          => 'post_select',
              'args'          => array(
                  'post_type' => 'block',
              ),
              'repeatable'    => true,
          )


        )
        

    );


  $autorent_page->add_meta_box(

      'autorent_search_form',
      'Choose Your Search Form',

      array(

          array(
            
              'name'          => 'type',
              'label'         => 'Select Search Form',             
              'type'          => 'select',
              'options'       => array(

                  'search_form_with_solid_bg'    => 'Search Form With Solid Background',
                  'search_form_with_transparent_bg'    => 'Search Form With Transparent Background',
                                    
              ),
              
           )

         
        )
    );


    /*$casa_page->add_meta_box(
        'autorent_contact_address',
        'Company Agency Contact Information',

        array(
              
            'bundle', 

            array(

                array(
                    'name'          => 'location',
                    'label'         => 'Office Location',                    
                    'type'          => 'text',                   
                ),

                array(
                    'name'          => 'field',
                    'label'         => 'Address Field of Office',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'field2',
                    'label'         => 'Address 2nd Field of Office',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),


                array(
                    'name'          => 'email',
                    'label'         => 'Official Email',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),
                array(
                    'name'          => 'phone',
                    'label'         => 'Official Phone No',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'fax',
                    'label'         => 'Official Fax No',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'website',
                    'label'         => 'Official Website',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),
                array(
                    'name'          => 'lat',
                    'label'         => 'Latitude',                    
                    'type'          => 'text',                    
                ),
                array(
                    'name'          => 'lng',
                    'label'         => 'Longitude',                    
                    'type'          => 'text',                    
                ),

                array(
                    'name'          => 'company_icon',
                    'label'         => 'Icon For Google Map',
                    'description'   => 'Insert icon that show on google map',
                    'type'          => 'image',
                )

            )
        )
    );*/


    /*$casa_page->add_meta_box(

      'autorent_property_address',
      'Generate Company Location For Google Map',

      array(

          array(
              'label' => __('Page Templates', 'casa'),
              'name' => 'page_templates',
              'type' => 'hidden',              
          ),

          array(
              'label' => __('Country Name ', 'casa'),
              'name' => 'country_name',
              'type' => 'text',
              'desc' => __('Country', 'casa')
          ),
          array(
              'label' => __('Region Name', 'casa'),
              'name' => 'region_name',
              'type' => 'text',
              'desc' => __('Region', 'casa')
          ),
          array(
              'label' => __('Address Name', 'casa'),
              'name' => 'name',
              'type' => 'text',
              'desc' => __('Address', 'casa')
          ),
          array(
              'label' => __('Zip Code of Region', 'casa'),
              'name' => 'zip',
              'type' => 'text',
              'desc' => __('ZIP codes', 'casa')
          ),
          array(
              'label' => 'map canvas',
              'name'  => 'map_canvas',
              'type' => 'hidden',

          ),
          array(
              'name'          => 'convert_zip',
              'label'         => 'Covert to zip code to latitude and longitude',
              'description'   => 'click checkbox to find result',
              'type'          => 'checkbox',
              'default_value' => 'off'
          ),
          array(
              'label' => __('Latitude', 'casa'),
              'name' => 'lat',
              'type' => 'text',
              'std' => '0',
              'desc' => __('Latitude', 'casa')
          ),
          array(
              'label' => __('Longitude', 'casa'),
              'name' => 'lng',
              'type' => 'text',
              'std' => '0',
              'desc' => __('longitude', 'casa')
          ),

        )

    );*/



/*-------------------------------------------------------------------------
  END PAGE POST TYPE
------------------------------------------------------------------------- */



/*-------------------------------------------------------------------------
  START COMPANY LOCATION POST TYPE
------------------------------------------------------------------------- */



  $autorent_company_locations  = new Cuztom_Post_Type( 'company location', array(
        "label" => 'Company Locations',
        "menu_position"   => 6,     
        'has_archive'     => true,
        'taxonomies'      => array('post_tag' ),     
        'supports'        => array('title', 'editor','thumbnail')
      ) 
    );




    $autorent_company_locations->add_meta_box(

        'autorent_company_location',
        'Company Agency Contact Information',

        array(
      
                array(
                    'name'          => 'place',
                    'label'         => 'Office Location',                    
                    'type'          => 'text',                   
                ),

                array(
                    'name'          => 'field_1',
                    'label'         => 'First Address Field',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'field_2',
                    'label'         => 'Second Address Field',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'email',
                    'label'         => 'Official Email',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),
                array(
                    'name'          => 'phone',
                    'label'         => 'Official Phone No',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'fax',
                    'label'         => 'Official Fax No',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'website',
                    'label'         => 'Official Website',                    
                    'type'          => 'text',
                    'repeatable'    => true
                ),

                array(
                    'name'          => 'icon',
                    'label'         => 'Icon For Google Map',
                    'description'   => 'Insert icon that show on google map',
                    'type'          => 'image',
                )

         
        )
    );


    $autorent_company_locations->add_meta_box(

      'autorent_property_address',
      'Comany Agency Location on Google Map',

      array(

          array(
              'label' => __('Country Name ', 'casa'),
              'name' => 'country_name',
              'type' => 'text',
              'desc' => __('Country', 'casa')
          ),
          array(
              'label' => __('Region Name', 'casa'),
              'name' => 'region_name',
              'type' => 'text',
              'desc' => __('Region', 'casa')
          ),
          array(
              'label' => __('Address Name', 'casa'),
              'name' => 'name',
              'type' => 'text',
              'desc' => __('Address', 'casa')
          ),
          array(
              'label' => __('Zip Code of Region', 'casa'),
              'name' => 'zip',
              'type' => 'text',
              'desc' => __('ZIP codes', 'casa')
          ),
          array(
              'label' => 'map canvas',
              'name'  => 'map_canvas',
              'type' => 'hidden',

            ),
          array(
              'name'          => 'convert_zip',
              'label'         => 'Covert to zip code to latitude and longitude',
              'description'   => 'click checkbox to find result',
              'type'          => 'checkbox',
              'default_value' => 'off'
          ),
          array(
              'label' => __('Latitude', 'casa'),
              'name' => 'lat',
              'type' => 'text',
              'std' => '0',
              'desc' => __('Latitude', 'casa')
          ),
          array(
              'label' => __('Longitude', 'casa'),
              'name' => 'lng',
              'type' => 'text',
              'std' => '0',
              'desc' => __('longitude', 'casa')
          ),

        )

    );



/*-------------------------------------------------------------------------
  END PAGE POST TYPE
------------------------------------------------------------------------- */



/*-------------------------------------------------------------------------
  START PRICING TABLE POST TYPE
------------------------------------------------------------------------- */



  /*$autorent_pricing_table  = new Cuztom_Post_Type( 'pricing table', array(
        "label" => 'Pricing Table',
        "menu_position"   => 6,     
        'has_archive'     => true,
        'taxonomies'      => array('post_tag' ),     
        'supports'        => array('title', 'editor','thumbnail')
      ) 
    );*/




    /*$autorent_pricing_table->add_meta_box(

        'autorent_pricing_table',
        'Pricing Table',

        array(

            'bundle',

             array(
      
                    array(
                        'name'          => 'title',
                        'label'         => 'Package Title',                    
                        'type'          => 'text',                   
                    ),

                    array(
                        'name'          => 'cost',
                        'label'         => 'Package Cost',                    
                        'type'          => 'text',                   
                    ),

                    array(
                        'name'          => 'cost_unit',
                        'label'         => 'Package Cost Unit',                    
                        'type'          => 'text',                   
                    ),

                    array(
                        'name'          => 'time_span',
                        'label'         => 'Package Time Sapn',                    
                        'type'          => 'text',                   
                    ),

                    array(
                        'name'          => 'package_include',
                        'label'         => 'Package Includes',                    
                        'type'          => 'text',
                        'repeatable'    => true
                    ),

                    array(
                        'name'          => 'button_url',
                        'label'         => 'Package Button URL',                    
                        'type'          => 'text',                   
                    ),

                    array(
                        'name'          => 'button_text',
                        'label'         => 'Package Button Text',                    
                        'type'          => 'text',                   
                    ),
             
            )


          )

       
    );*/


/*-------------------------------------------------------------------------
  END PAGE POST TYPE
------------------------------------------------------------------------- */









/*-------------------------------------------------------------------------
  START ADDED CUSTOM META BOX OF PRODUCT POST TYPE OF WOO-COMMERCE
------------------------------------------------------------------------- */


  $product_post = new Cuztom_Post_Type('product');

  $product_post->add_meta_box(

      'autorent_vehicle',
      'Vechicles Information',

      array(

          array(
              'label' => __('Vehicle Age ', 'autorent'),
              'name' => 'age',
              'type' => 'text',              
          ),
          array(
              'label' => __('Fuel Capacity', 'autorent'),
              'name' => 'fuel_capacity',
              'type' => 'text',              
          ),
          array(
              'label' => __('Max Speed', 'autorent'),
              'name' => 'max_speed',
              'type' => 'text',              
          ),
          array(
              'label' => __('Capacity (People)', 'autorent'),
              'name' => 'people_capacity',
              'type' => 'text',              
          ),
          array(
              'label' => __('Capacity (Additional People)', 'autorent'),
              'name' => 'additional_people_capacity',
              'type' => 'text',              
          ),
          array(
              'label' => __('Max Weight', 'autorent'),
              'name' => 'max_weight',
              'type' => 'text',             
          ),
          array(
              'label' => 'Pilots (Min.)',
              'name'  => 'pilots',
              'type' => 'text',

            ),
          
        )

    );


    $product_post->add_meta_box(
      'autorent_add_attribute',
      'Add More Attributes',

      array(

          'bundle',

          array(
          
              array(
                  'name'          => 'name',
                  'label'         => 'Attributes Name',                 
                  'type'          => 'text'
              ),

              array(
                  'name'          => 'value',
                  'label'         => 'Attributes Value',                  
                  'type'          => 'text'
              )
          )
      )
  );



  $product_post->add_meta_box(

      'autorent_property_address',
      'Vehicles Location on Google Map',

      array(

          array(
              'label' => __('Country Name ', 'casa'),
              'name' => 'country_name',
              'type' => 'text',
              'desc' => __('Country', 'casa')
          ),
          array(
              'label' => __('Region Name', 'casa'),
              'name' => 'region_name',
              'type' => 'text',
              'desc' => __('Region', 'casa')
          ),
          array(
              'label' => __('Address Name', 'casa'),
              'name' => 'name',
              'type' => 'text',
              'desc' => __('Address', 'casa')
          ),
          array(
              'label' => __('Zip Code of Region', 'casa'),
              'name' => 'zip',
              'type' => 'text',
              'desc' => __('ZIP codes', 'casa')
          ),
          array(
              'label' => 'map canvas',
              'name'  => 'map_canvas',
              'type' => 'hidden',

            ),
          array(
              'name'          => 'convert_zip',
              'label'         => 'Covert to zip code to latitude and longitude',
              'description'   => 'click checkbox to find result',
              'type'          => 'checkbox',
              'default_value' => 'off'
          ),
          array(
              'label' => __('Latitude', 'casa'),
              'name' => 'lat',
              'type' => 'text',
              'std' => '0',
              'desc' => __('Latitude', 'casa')
          ),
          array(
              'label' => __('Longitude', 'casa'),
              'name' => 'lng',
              'type' => 'text',
              'std' => '0',
              'desc' => __('longitude', 'casa')
          ),

        )

    );




  /*$product_post->add_meta_box(

        'autorent_pricing_table',
        'Pricing Table',

        array(

            'bundle',

             array(
      
                    array(
                        'name'          => 'title',
                        'label'         => 'Package Title',                    
                        'type'          => 'text',                   
                    ),

                    array(
                        'name'          => 'time_span',
                        'label'         => 'Package Time Sapn',                    
                        'type'          => 'text',                   
                    ),

                    array(
                        'name'          => 'package_include',
                        'label'         => 'Package Includes',                    
                        'type'          => 'text',
                        'repeatable'    => true
                    ),

            )


          )

       
    );
*/






/*-------------------------------------------------------------------------
  END ADDED CUSTOM META BOX OF PRODUCT POST TYPE OF WOO-COMMERCE
------------------------------------------------------------------------- */




/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 

  $car_types = register_cuztom_taxonomy( 'Car Type', 'product' );



/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 



/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 

  $car_brands = register_cuztom_taxonomy( 'Car Brand', 'product' );


/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 


/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 

  $car_models = register_cuztom_taxonomy( 'Car Model', 'product' );

/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 


/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 

  $car_amenities = register_cuztom_taxonomy( 'Amenity', 'product' );

/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 


/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 

  $car_states = register_cuztom_taxonomy( 'state', 'product' );

/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 



/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 

  $car_city = register_cuztom_taxonomy( 'city', 'product' );

/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 


/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 

  $car_airport = register_cuztom_taxonomy( 'Airport', 'product' );

/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 



/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */

  $car_return_location = register_cuztom_taxonomy( 'Return Location', 'product' );

/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 




/*-------------------------------------------------------------------------
  START ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */

  $car_reservation_type = register_cuztom_taxonomy( 'Reservation Type', 'product' );

/*-------------------------------------------------------------------------
  END ADDED TYPES CUSTOM TAXONOMY IN PRODUCT CPT
------------------------------------------------------------------------- */ 




