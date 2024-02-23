<?php
function fwd_register_custom_post_types() {
    // Staff CPT
    $labels = array(
        'name'                  => _x( 'Staff', 'post type general name' ),
        'singular_name'         => _x( 'Staff', 'post type singular name'),
        'menu_name'             => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'        => _x( 'Staff', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'staff' ),
        'add_new_item'          => __( 'Add New Staff' ),
        'new_item'              => __( 'New Staff' ),
        'edit_item'             => __( 'Edit Staff' ),
        'view_item'             => __( 'View Staff' ),
        'all_items'             => __( 'All Staff' ),
        'search_items'          => __( 'Search Staff' ),
        'parent_item_colon'     => __( 'Parent Staff:' ),
        'not_found'             => __( 'No works found.' ),
        'not_found_in_trash'    => __( 'No works found in Trash.' ),
        'archives'              => __( 'Staff Archives'),
        'insert_into_item'      => __( 'Insert into staff'),
        'uploaded_to_this_item' => __( 'Uploaded to this staff'),
        'filter_item_list'      => __( 'Filter staff list'),
        'items_list_navigation' => __( 'Staff list navigation'),
        'items_list'            => __( 'Staff list'),
        'featured_image'        => __( 'Staff featured image'),
        'set_featured_image'    => __( 'Set staff featured image'),
        'remove_featured_image' => __( 'Remove staff featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title'),
    );

    register_post_type( 'fwd-staff', $args );

    //students
    $labels = array(
      'name'                  => _x( 'Students', 'post type general name' ),
      'singular_name'         => _x( 'Student', 'post type singular name'),
      'menu_name'             => _x( 'Students', 'admin menu' ),
      'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
      'add_new'               => _x( 'Add New', 'student' ),
      'add_new_item'          => __( 'Add New Student' ),
      'new_item'              => __( 'New Student' ),
      'edit_item'             => __( 'Edit Student' ),
      'view_item'             => __( 'View Student' ),
      'all_items'             => __( 'All Students' ),
      'search_items'          => __( 'Search Students' ),
      'parent_item_colon'     => __( 'Parent Students:' ),
      'not_found'             => __( 'No students found.' ),
      'not_found_in_trash'    => __( 'No students found in Trash.' ),
      'archives'              => __( 'Student Archives'),
      'insert_into_item'      => __( 'Insert into student'),
      'uploaded_to_this_item' => __( 'Uploaded to this student'),
      'filter_item_list'      => __( 'Filter student list'),
      'items_list_navigation' => __( 'Students list navigation'),
      'items_list'            => __( 'Students list'),
      'featured_image'        => __( 'Student featured image'),
      'set_featured_image'    => __( 'Set student featured image'),
      'remove_featured_image' => __( 'Remove student featured image'),
      'use_featured_image'    => __( 'Use as featured image'),
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'show_in_nav_menus'  => true,
      'show_in_admin_bar'  => true,
      'show_in_rest'       => true,
      'template'            => array(
        array( 'core/paragraph', array(
          'placeholder' => 'Add your introduction here...'
        ) ),
        array( 'core/button' )
    ),

      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'students' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'menu_icon'          => 'dashicons-archive',
      'supports'           => array( 'title', 'thumbnail', 'editor' ),
  );
  register_post_type( 'school-site-students', $args );


  }


add_action( 'init', 'fwd_register_custom_post_types' );

function fwd_register_taxonomies() {
    // Add Staff CPT Taxonomy
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff' ),
        'all_items'         => __( 'All Staff' ),
        'parent_item'       => __( 'Parent Staff' ),
        'parent_item_colon' => __( 'Parent Staff:' ),
        'edit_item'         => __( 'Edit Staff' ),
        'view_item'         => __( 'View Staff' ),
        'update_item'       => __( 'Update Staff' ),
        'add_new_item'      => __( 'Add New Staff' ),
        'new_item_name'     => __( 'New Staff Name' ),
        'menu_name'         => __( 'Staff Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );
    register_taxonomy( 'fwd-staff-category', array( 'fwd-staff' ), $args );
}
add_action( 'init', 'fwd_register_taxonomies');
//taxonomy
function fwd_register_taxonomies_service() {
  $labels = array(
    'name'              => _x( 'Students', 'taxonomy general name' ),
    'singular_name'     => _x( 'Student', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Students' ),
    'all_items'         => __( 'All Students' ),
    'parent_item'       => __( 'Parent Students' ),
    'parent_item_colon' => __( 'Parent Students:' ),
    'edit_item'         => __( 'Edit Students' ),
    'update_item'       => __( 'Update Students' ),
    'add_new_item'      => __( 'Add New Student' ),
    'new_item_name'     => __( 'New Student' ),
    'menu_name'         => __( 'Students' ),
  );
  
  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_menu'      => true,
    'show_in_nav_menu'  => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'student-types' ),
  );
  
  register_taxonomy( 'school-site-students-taxonomy', array( 'school-site-students' ), $args ); 
}

add_action( 'init', 'fwd_register_taxonomies_service');
