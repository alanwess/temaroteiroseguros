<?php

	add_theme_support( 'post-thumbnails' );
	
	function get_titulo() {
		if(is_home() || is_front_page()) {
			echo get_bloginfo( 'description' );
			echo ' - ';
			bloginfo('name');
		} elseif (is_author()) {
			$author = get_queried_object();
    		$author_id = $author->ID;
    		echo get_author_name($author_id);
			echo ' - ';
			bloginfo('name');
		} elseif (is_search()){
			echo 'Buscando por resultados em "';
    		echo get_search_query();
			echo '" - ';
			bloginfo('name');
		} elseif (is_category()){
			$categoriaid = get_queried_object();
    		$categorianame = get_the_category_by_ID($categoriaid->term_id);
    		echo 'Pagina da categoria ';
    		echo $categorianame;
			echo ' - ';
			bloginfo('name');
		} elseif(is_404()){
			echo 'Nada encontrado neste endereço :(';
			echo ' - ';
			bloginfo('name');
		}else {
			the_title();
			echo ' - ';
			bloginfo('name');
		}
	}

	function the_breadcrumb() {
			echo '<ol class="breadcrumb">';
		if (!is_home()) {
			echo '<li class="breadcrumb-item"><a href="';
			echo get_option('home');
			echo '">';
			echo '<i class="fa fa-home"></i> Home';
			echo "</a></li>";
			if (is_category() || is_single()) {
				echo '<li class="breadcrumb-item">';
				the_category(' </li><li> ');
				if (is_single()) {
					echo '</li><li class="breadcrumb-item">';
					the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				echo '<li class="breadcrumb-item">';
				echo the_title();
				echo '</li>';
			}
		}
		elseif (is_tag()) {single_tag_title();}
		elseif (is_day()) {echo'<li class="breadcrumb-item">Arquivo para '; the_time('F jS, Y'); echo'</li>';}
		elseif (is_month()) {echo'<li class="breadcrumb-item">Arquivo para '; the_time('F, Y'); echo'</li>';}
		elseif (is_year()) {echo'<li class="breadcrumb-item">Arquivo para '; the_time('Y'); echo'</li>';}
		elseif (is_author()) {echo'<li class="breadcrumb-item">Arquivo do Autor'; echo'</li>';}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo '<li class="breadcrumb-item">Arquivo'; echo'</li>';}
		elseif (is_search()) {echo'<li class="breadcrumb-item">Resultados de busca'; echo'</li>';}
		echo '</ol>';
	}

	function searchfilter($query) {
 
	    if ($query->is_search && !is_admin() ) {
	        $query->set('post_type',array('post'));
	        $query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
      		$query->set('posts_per_page',10);
	    }
	 
		return $query;
	}
	add_filter('pre_get_posts','searchfilter');

	function tt_reading_time($postID) {
		 $content = get_post_field('post_content');
		 $word_count = str_word_count(strip_tags($content));
		 $char_count = mb_strlen(strip_tags($content), "UTF-8");
		 
		 $char_lmin=1200; $lmin = 60;
		 
		 $x = $char_count * $lmin;
		 $x = $x / $char_lmin;
		 
		 if ($char_count <= 1200) {
		 $tempo .= '< 1 min';
		 }
		 else {
		 if ($x > 3599) $tempo .= gmdate("H:i:s", $x) . ' min';
		 else $tempo .= gmdate("i:s", $x) . ' min';
		 }
		 return $tempo;
	}

	function scrapeImage($text) {
    	$pattern = '/src=[\'"]?([^\'" >]+)[\'" >]/';
    	preg_match($pattern, $text, $link);
    	$link = $link[1];
    	$link = urldecode($link);
    	return $link;
	}

	function getPostViews_offpost($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 Visualizações";
	    }
		else if ($count == '1') {
			return "1 Visualização";
		}
	    return $count.' Visualizações';
	}

	function getPostViews_inpost($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "1 Visualização";
	    }
		else if ($count == '1') {
			return "2 Visualizações";
		}
	    return $count.' Visualizações';
	}
	
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	// Remove issues with prefetching adding extra views
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

?>