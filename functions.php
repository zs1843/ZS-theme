<?php
/**
 * ZS Theme functions and definitions.
 *
 * @package zs-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function zs_theme_enqueue_styles() {
	wp_enqueue_style(
		'zs-theme-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'zs_theme_enqueue_styles' );

function zs_theme_register_pattern_categories() {
	register_block_pattern_category( 'zs-theme', array(
		'label' => __( 'ZS Theme', 'zs-theme' ),
	) );
}
add_action( 'init', 'zs_theme_register_pattern_categories' );

function zs_theme_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'zs_theme_setup' );

// ── Visit counter (file-based, no plugin dependency) ──

function zs_get_visit_count() {
	$file = get_stylesheet_directory() . '/zs-visit-count.txt';
	$count = 0;
	if ( file_exists( $file ) ) {
		$count = (int) file_get_contents( $file );
	}
	return $count;
}

function zs_increment_visit_count() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
		return;
	}
	$file = get_stylesheet_directory() . '/zs-visit-count.txt';
	$count = zs_get_visit_count();
	$count++;
	file_put_contents( $file, $count );
}
add_action( 'wp', 'zs_increment_visit_count' );

function zs_shortcode_visit_count() {
	return number_format_i18n( zs_get_visit_count() );
}
add_shortcode( 'zs_visit_count', 'zs_shortcode_visit_count' );

// ── Site running days ──

function zs_shortcode_running_days() {
	$install_date = get_option( 'zs_site_install_date' );
	if ( ! $install_date ) {
		$install_date = current_time( 'Y-m-d' );
		update_option( 'zs_site_install_date', $install_date );
	}
	$start = new DateTime( $install_date );
	$now   = new DateTime( current_time( 'Y-m-d' ) );
	$diff  = $start->diff( $now );
	return $diff->days;
}
add_shortcode( 'zs_running_days', 'zs_shortcode_running_days' );

// ── Total posts count ──

function zs_shortcode_total_posts() {
	$count = wp_count_posts();
	return number_format_i18n( $count->publish );
}
add_shortcode( 'zs_total_posts', 'zs_shortcode_total_posts' );

// ── Current year ──

function zs_shortcode_current_year() {
	return current_time( 'Y' );
}
add_shortcode( 'zs_current_year', 'zs_shortcode_current_year' );

// ── Register widget areas for sidebar ──

function zs_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'zs-theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in the sidebar.', 'zs-theme' ),
		'before_widget' => '<div class="zs-sidebar-card" style="margin-bottom:var(--wp--preset--spacing--30)">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="zs-sidebar-title" style="font-size:var(--wp--preset--font-size--small);font-weight:600;margin-top:0;">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'zs_theme_widgets_init' );

// ── ZS Theme Settings Page ──

function zs_theme_settings_defaults() {
	return array(
		'show_theme_toggle'  => '1',
		'show_search'        => '1',
		'show_clock'         => '1',
		'show_running_time'  => '1',
		'post_layout'        => 'card',
		'site_install_date'  => '',
		'ad_image_url'       => '',
		'ad_link_url'        => '',
		'inner_page_label'   => '> $ cd /home/',
		'avatar_url'         => '',
		'blogger_name'       => '',
		'banner_images'      => '',
		'banner_interval'    => '5',
		'banner_position'    => 'fullwidth',
		'bing_api_key'       => '',
		'bing_banner_query'  => '',
	);
}

function zs_theme_get_option( $key ) {
	$opts = get_option( 'zs_theme_options', array() );
	$defaults = zs_theme_settings_defaults();
	return isset( $opts[ $key ] ) ? $opts[ $key ] : ( isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}

function zs_theme_admin_menu() {
	add_theme_page(
		'ZS 主题设置',
		'ZS 主题',
		'manage_options',
		'zs-theme-settings',
		'zs_theme_settings_page'
	);
}
add_action( 'admin_menu', 'zs_theme_admin_menu' );

function zs_theme_settings_init() {
	register_setting( 'zs_theme_options_group', 'zs_theme_options', 'zs_theme_sanitize_options' );
}
add_action( 'admin_init', 'zs_theme_settings_init' );

function zs_theme_sanitize_options( $input ) {
	$defaults = zs_theme_settings_defaults();
	$output = array();
	foreach ( $defaults as $key => $default ) {
		if ( in_array( $key, array( 'show_theme_toggle', 'show_search', 'show_clock', 'show_running_time' ), true ) ) {
			$output[ $key ] = ! empty( $input[ $key ] ) ? '1' : '0';
		} elseif ( $key === 'post_layout' ) {
			$allowed = array( 'card', 'grid', 'compact', 'image-left' );
			$output[ $key ] = in_array( $input[ $key ], $allowed, true ) ? $input[ $key ] : 'card';
		} elseif ( in_array( $key, array( 'ad_image_url', 'ad_link_url', 'avatar_url' ), true ) ) {
			$output[ $key ] = esc_url_raw( $input[ $key ] ?? '' );
		} elseif ( $key === 'banner_images' ) {
			$raw   = sanitize_textarea_field( $input[ $key ] ?? '' );
			$urls  = array_filter( array_map( 'trim', explode( ',', $raw ) ) );
			$clean = array_map( 'esc_url_raw', $urls );
			$output[ $key ] = implode( ',', $clean );
		} elseif ( $key === 'banner_interval' ) {
			$val = (int) ( $input[ $key ] ?? 5 );
			$output[ $key ] = (string) max( 2, min( 30, $val ) );
		} elseif ( $key === 'banner_position' ) {
			$output[ $key ] = in_array( $input[ $key ] ?? '', array( 'fullwidth', 'inner' ), true )
				? $input[ $key ] : 'fullwidth';
		} elseif ( $key === 'bing_api_key' ) {
			$output[ $key ] = sanitize_text_field( $input[ $key ] ?? '' );
		} elseif ( $key === 'bing_banner_query' ) {
			$output[ $key ] = sanitize_text_field( $input[ $key ] ?? '' );
		} else {
			$output[ $key ] = sanitize_text_field( $input[ $key ] ?? $default );
		}
	}
	return $output;
}

function zs_theme_settings_page() {
	$opts = get_option( 'zs_theme_options', array() );
	$defaults = zs_theme_settings_defaults();
	$opts = wp_parse_args( $opts, $defaults );

	if ( empty( $opts['site_install_date'] ) ) {
		$install_date = get_option( 'zs_site_install_date', current_time( 'Y-m-d' ) );
		$opts['site_install_date'] = $install_date;
	}
	?>
	<div class="wrap">
		<h1>ZS 主题设置</h1>
		<form method="post" action="options.php">
			<?php settings_fields( 'zs_theme_options_group' ); ?>
			<table class="form-table">
				<tr>
					<th scope="row">顶部组件</th>
					<td>
						<label><input type="checkbox" name="zs_theme_options[show_theme_toggle]" value="1" <?php checked( $opts['show_theme_toggle'], '1' ); ?>> 显示深色/浅色模式切换</label><br>
						<label><input type="checkbox" name="zs_theme_options[show_search]" value="1" <?php checked( $opts['show_search'], '1' ); ?>> 显示搜索框 (Ctrl+K / ⌘K)</label>
					</td>
				</tr>
				<tr>
					<th scope="row">内页导航标签</th>
					<td>
						<input type="text" name="zs_theme_options[inner_page_label]" value="<?php echo esc_attr( $opts['inner_page_label'] ); ?>" class="regular-text">
						<p class="description">非首页时导航左侧显示的文字（如 "> $ cd /home/"）。留空则始终显示 Logo + 站点名称。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">小工具与显示</th>
					<td>
						<label><input type="checkbox" name="zs_theme_options[show_clock]" value="1" <?php checked( $opts['show_clock'], '1' ); ?>> 显示实时时钟</label><br>
						<label><input type="checkbox" name="zs_theme_options[show_running_time]" value="1" <?php checked( $opts['show_running_time'], '1' ); ?>> 显示网站运行时间</label>
					</td>
				</tr>
				<tr>
					<th scope="row">网站创建日期</th>
					<td>
						<input type="date" name="zs_theme_options[site_install_date]" value="<?php echo esc_attr( $opts['site_install_date'] ); ?>">
						<p class="description">用于计算"本站已运行 X 天"。默认为首次激活日期。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">文章列表布局</th>
					<td>
						<select name="zs_theme_options[post_layout]">
							<option value="card" <?php selected( $opts['post_layout'], 'card' ); ?>>卡片（默认）</option>
							<option value="grid" <?php selected( $opts['post_layout'], 'grid' ); ?>>网格（2列）</option>
							<option value="compact" <?php selected( $opts['post_layout'], 'compact' ); ?>>紧凑列表</option>
							<option value="image-left" <?php selected( $opts['post_layout'], 'image-left' ); ?>>图片在上</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row">博主头像</th>
					<td>
						<input type="url" name="zs_theme_options[avatar_url]" value="<?php echo esc_attr( $opts['avatar_url'] ); ?>" class="regular-text" placeholder="https://example.com/avatar.jpg">
						<p class="description">侧边栏头像图片地址。留空则显示默认占位图。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">博主名称</th>
					<td>
						<input type="text" name="zs_theme_options[blogger_name]" value="<?php echo esc_attr( $opts['blogger_name'] ); ?>" class="regular-text" placeholder="ZS">
						<p class="description">侧边栏显示的博主名称。留空则显示"ZS"。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">侧边栏广告图片</th>
					<td>
						<input type="url" name="zs_theme_options[ad_image_url]" value="<?php echo esc_attr( $opts['ad_image_url'] ); ?>" class="regular-text" placeholder="https://example.com/qrcode.png">
						<p class="description">侧边栏广告位的图片地址（如微信二维码）。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">广告链接地址</th>
					<td>
						<input type="url" name="zs_theme_options[ad_link_url]" value="<?php echo esc_attr( $opts['ad_link_url'] ); ?>" class="regular-text" placeholder="https://example.com">
						<p class="description">点击广告图片时跳转的链接（可选）。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">首页 Banner 图片</th>
					<td>
						<textarea name="zs_theme_options[banner_images]" class="large-text" rows="3" placeholder="https://example.com/img1.jpg, https://example.com/img2.jpg"><?php echo esc_textarea( $opts['banner_images'] ); ?></textarea>
						<p class="description">多张图片用英文逗号分隔，配置多张时自动开启轮播。留空则不显示 Banner。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">轮播间隔（秒）</th>
					<td>
						<input type="number" name="zs_theme_options[banner_interval]" value="<?php echo esc_attr( $opts['banner_interval'] ); ?>" min="2" max="30" style="width:80px">
						<p class="description">多图轮播的自动切换间隔，2–30 秒，默认 5 秒。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">Banner 位置</th>
					<td>
						<select name="zs_theme_options[banner_position]">
							<option value="fullwidth" <?php selected( $opts['banner_position'], 'fullwidth' ); ?>>全宽（导航栏正下方，无间距）</option>
							<option value="inner" <?php selected( $opts['banner_position'], 'inner' ); ?>>内嵌（文章列表顶部小 Banner）</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row">自动获取 Banner 图片</th>
					<td>
						<button type="button" id="zs-fetch-banner" class="button">🔍 从必应自动获取 Banner 图片</button>
						<span id="zs-fetch-banner-status" style="margin-left:10px;color:#666;"></span>
						<p class="description">根据下方关键词从必应图片搜索获取3张横向图片并自动填入上方配置。需要先填写 Bing API Key。</p>
					</td>
				</tr>
			</table>

			<h2 class="title">图片自动获取配置</h2>
			<table class="form-table">
				<tr>
					<th scope="row">Bing 图片搜索 API Key</th>
					<td>
						<input type="text" name="zs_theme_options[bing_api_key]" value="<?php echo esc_attr( $opts['bing_api_key'] ); ?>" class="regular-text" placeholder="在 Azure 申请免费 Bing Search API Key">
						<p class="description">前往 <a href="https://www.microsoft.com/en-us/bing/apis/bing-image-search-api" target="_blank">azure.microsoft.com</a> 申请免费 Bing Search v7 Key（每月1000次免费）。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">Banner 图片搜索关键词</th>
					<td>
						<input type="text" name="zs_theme_options[bing_banner_query]" value="<?php echo esc_attr( $opts['bing_banner_query'] ); ?>" class="regular-text" placeholder="例如：风景 壁纸 宽屏">
						<p class="description">自动获取 Banner 图片时使用的搜索词，留空则使用站点名称。</p>
					</td>
				</tr>
				<tr>
					<th scope="row">刷新文章特色图片</th>
					<td>
						<button type="button" id="zs-fetch-posts-images" class="button">🖼 为无封面文章自动配图</button>
						<span id="zs-fetch-posts-status" style="margin-left:10px;color:#666;"></span>
						<p class="description">为所有没有特色图片的文章，以文章标题为关键词从必应搜索并自动设置封面图（16:9）。每次处理最多10篇。</p>
					</td>
				</tr>
			</table>

			<?php submit_button( '保存设置' ); ?>
		</form>
	</div>

	<script>
	(function($) {
		var nonce = '<?php echo esc_js( wp_create_nonce( 'zs_admin_ajax' ) ); ?>';
		var ajaxUrl = '<?php echo esc_js( admin_url( 'admin-ajax.php' ) ); ?>';

		function zsAdminAjax(action, statusEl, successMsg) {
			statusEl.text('处理中…');
			$.post(ajaxUrl, { action: action, nonce: nonce }, function(res) {
				if (res.success) {
					statusEl.css('color', 'green').text(successMsg + (res.data.detail || ''));
				} else {
					statusEl.css('color', 'red').text('失败：' + (res.data.message || '未知错误'));
				}
			}).fail(function() {
				statusEl.css('color', 'red').text('请求失败，请检查网络或 API Key。');
			});
		}

		$('#zs-fetch-banner').on('click', function() {
			zsAdminAjax('zs_fetch_banner_images', $('#zs-fetch-banner-status'), '✓ Banner 图片已更新！');
		});

		$('#zs-fetch-posts-images').on('click', function() {
			zsAdminAjax('zs_fetch_post_images', $('#zs-fetch-posts-status'), '✓ 完成！');
		});
	})(jQuery);
	</script>
	<?php
}

// ── Running time shortcode (enhanced with real-time JS) ──

function zs_shortcode_running_time() {
	if ( zs_theme_get_option( 'show_running_time' ) === '0' ) {
		return '';
	}
	$install_date = zs_theme_get_option( 'site_install_date' );
	if ( empty( $install_date ) ) {
		$install_date = get_option( 'zs_site_install_date', current_time( 'Y-m-d' ) );
	}
	$start = new DateTime( $install_date );
	$now   = new DateTime( current_time( 'Y-m-d H:i:s' ) );
	$diff  = $now->getTimestamp() - $start->getTimestamp();
	return '<span class="zs-running-time" data-start="' . esc_attr( $start->getTimestamp() ) . '">'
		. esc_html( floor( $diff / 86400 ) ) . '天'
		. esc_html( floor( ( $diff % 86400 ) / 3600 ) ) . '时'
		. esc_html( floor( ( $diff % 3600 ) / 60 ) ) . '分'
		. esc_html( $diff % 60 ) . '秒'
		. '</span>';
}
add_shortcode( 'zs_running_time', 'zs_shortcode_running_time' );

// ── Clock shortcode ──

function zs_shortcode_clock() {
	if ( zs_theme_get_option( 'show_clock' ) === '0' ) {
		return '';
	}
	return '<span class="zs-clock"></span>';
}
add_shortcode( 'zs_clock', 'zs_shortcode_clock' );

// ── Ad image shortcode ──

function zs_shortcode_ad_image() {
	$img_url  = zs_theme_get_option( 'ad_image_url' );
	$link_url = zs_theme_get_option( 'ad_link_url' );
	if ( empty( $img_url ) ) {
		return '<p class="has-text-align-center has-text-color" style="color:var(--wp--preset--color--muted);font-size:var(--wp--preset--font-size--small);padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">广告位招租，欢迎联系。</p>';
	}
	$img = '<img src="' . esc_url( $img_url ) . '" alt="Ad" style="max-width:100%;height:auto;border-radius:8px;">';
	if ( ! empty( $link_url ) ) {
		return '<a href="' . esc_url( $link_url ) . '" target="_blank" rel="noopener noreferrer" style="display:block;text-align:center;">' . $img . '</a>';
	}
	return '<div style="text-align:center;">' . $img . '</div>';
}
add_shortcode( 'zs_ad_image', 'zs_shortcode_ad_image' );

// ── Post layout class ──

function zs_post_layout_body_class( $classes ) {
	$layout = zs_theme_get_option( 'post_layout' );
	if ( $layout && $layout !== 'card' ) {
		$classes[] = 'zs-layout-' . sanitize_html_class( $layout );
	}
	return $classes;
}
add_filter( 'body_class', 'zs_post_layout_body_class' );

// ── Enqueue frontend JS ──

function zs_theme_enqueue_scripts() {
	wp_enqueue_script(
		'zs-theme-scripts',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	$install_date = zs_theme_get_option( 'site_install_date' );
	if ( empty( $install_date ) ) {
		$install_date = get_option( 'zs_site_install_date', current_time( 'Y-m-d' ) );
	}

	$banner_interval = (int) zs_theme_get_option( 'banner_interval' );

	wp_localize_script( 'zs-theme-scripts', 'zsTheme', array(
		'showToggle'      => zs_theme_get_option( 'show_theme_toggle' ),
		'showSearch'      => zs_theme_get_option( 'show_search' ),
		'showClock'       => zs_theme_get_option( 'show_clock' ),
		'showRunningTime' => zs_theme_get_option( 'show_running_time' ),
		'installDate'     => $install_date,
		'innerPageLabel'  => zs_theme_get_option( 'inner_page_label' ),
		'homeUrl'         => esc_url( home_url( '/' ) ),
		'isHome'          => '',
		'avatarUrl'       => zs_theme_get_option( 'avatar_url' ),
		'bloggerName'     => zs_theme_get_option( 'blogger_name' ),
		'bannerInterval'  => max( 2, $banner_interval ?: 5 ) * 1000,
	) );
}
add_action( 'wp_enqueue_scripts', 'zs_theme_enqueue_scripts' );

function zs_set_is_home() {
	if ( wp_script_is( 'zs-theme-scripts', 'enqueued' ) ) {
		wp_add_inline_script( 'zs-theme-scripts', 'zsTheme.isHome = ' . ( is_front_page() || is_home() ? 'true' : 'false' ) . ';', 'before' );
	}
}
add_action( 'wp_enqueue_scripts', 'zs_set_is_home', 20 );

function zs_dark_mode_head_script() {
	?>
	<script>
	(function(){var s=localStorage.getItem('zs-color-scheme');if(s==='dark')document.documentElement.classList.add('zs-dark');})();
	</script>
	<?php
}
add_action( 'wp_head', 'zs_dark_mode_head_script', 1 );

// ── Banner shortcode ──

function zs_shortcode_banner( $atts ) {
	$atts     = shortcode_atts( array( 'position' => '' ), $atts );
	$position = zs_theme_get_option( 'banner_position' );

	// 'position' attr lets templates declare which slot they are.
	// Empty attr = always render (legacy/direct use).
	if ( ! empty( $atts['position'] ) && $atts['position'] !== $position ) {
		return '';
	}

	$images_str = zs_theme_get_option( 'banner_images' );
	$images     = array_values( array_filter( array_map( 'trim', explode( ',', $images_str ) ) ) );

	if ( empty( $images ) ) {
		return '';
	}

	$is_inner    = ( $position === 'inner' );
	$wrap_class  = 'zs-banner-wrap' . ( $is_inner ? ' zs-banner-inner' : ' zs-banner-fullwidth' );
	$multi       = count( $images ) > 1;

	$html = '<div class="' . esc_attr( $wrap_class ) . '"' . ( $multi ? ' data-banner-carousel="1"' : '' ) . '>';
	$html .= '<div class="zs-banner-track">';
	foreach ( $images as $i => $url ) {
		$active = ( $i === 0 ) ? ' zs-banner-active' : '';
		$html  .= '<div class="zs-banner-slide' . $active . '">';
		$html  .= '<img src="' . esc_url( $url ) . '" alt="" loading="' . ( $i === 0 ? 'eager' : 'lazy' ) . '">';
		$html  .= '</div>';
	}
	$html .= '</div>';

	if ( $multi ) {
		$html .= '<button class="zs-banner-prev" aria-label="上一张">&#8249;</button>';
		$html .= '<button class="zs-banner-next" aria-label="下一张">&#8250;</button>';
		$html .= '<div class="zs-banner-dots">';
		foreach ( $images as $i => $url ) {
			$html .= '<button class="zs-banner-dot' . ( $i === 0 ? ' zs-banner-active' : '' ) . '" data-index="' . $i . '" aria-label="第' . ( $i + 1 ) . '张"></button>';
		}
		$html .= '</div>';
	}

	$html .= '</div>';
	return $html;
}
add_shortcode( 'zs_banner', 'zs_shortcode_banner' );

// ── Google Fonts: Noto Serif SC for article body ──

function zs_enqueue_google_fonts() {
	wp_enqueue_style(
		'zs-noto-serif-sc',
		'https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'zs_enqueue_google_fonts' );

// ── Bing Image Search helpers ──

function zs_bing_search_images( $api_key, $query, $count = 1, $aspect = 'Wide' ) {
	$url    = 'https://api.bing.microsoft.com/v7.0/images/search';
	$params = array(
		'q'          => $query,
		'count'      => $count,
		'aspect'     => $aspect,
		'imageType'  => 'Photo',
		'safeSearch' => 'Moderate',
		'mkt'        => 'zh-CN',
	);
	$response = wp_remote_get( add_query_arg( $params, $url ), array(
		'headers' => array( 'Ocp-Apim-Subscription-Key' => $api_key ),
		'timeout' => 15,
	) );
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
		return array();
	}
	$body = json_decode( wp_remote_retrieve_body( $response ), true );
	$urls = array();
	if ( ! empty( $body['value'] ) ) {
		foreach ( $body['value'] as $item ) {
			if ( ! empty( $item['contentUrl'] ) ) {
				$urls[] = $item['contentUrl'];
			}
		}
	}
	return $urls;
}

function zs_sideload_image( $url, $post_id, $desc = '' ) {
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';
	$id = media_sideload_image( $url, $post_id, $desc, 'id' );
	return is_wp_error( $id ) ? false : $id;
}

// ── AJAX: fetch banner images from Bing ──

function zs_ajax_fetch_banner_images() {
	check_ajax_referer( 'zs_admin_ajax', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array( 'message' => '权限不足' ) );
	}

	$api_key = zs_theme_get_option( 'bing_api_key' );
	if ( empty( $api_key ) ) {
		wp_send_json_error( array( 'message' => '请先填写 Bing API Key' ) );
	}

	$query = zs_theme_get_option( 'bing_banner_query' );
	if ( empty( $query ) ) {
		$query = get_bloginfo( 'name' ) . ' 风景 壁纸';
	}

	$urls = zs_bing_search_images( $api_key, $query . ' 宽屏 横版', 3, 'Wide' );
	if ( empty( $urls ) ) {
		wp_send_json_error( array( 'message' => '未找到图片，请检查关键词或 API Key' ) );
	}

	$options                  = get_option( 'zs_theme_options', array() );
	$options['banner_images'] = implode( ',', array_map( 'esc_url_raw', $urls ) );
	update_option( 'zs_theme_options', $options );

	wp_send_json_success( array(
		'detail' => ' 共获取 ' . count( $urls ) . ' 张，已保存到 Banner 配置。',
		'urls'   => $urls,
	) );
}
add_action( 'wp_ajax_zs_fetch_banner_images', 'zs_ajax_fetch_banner_images' );

// ── AJAX: fetch post featured images from Bing ──

function zs_ajax_fetch_post_images() {
	check_ajax_referer( 'zs_admin_ajax', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array( 'message' => '权限不足' ) );
	}

	$api_key = zs_theme_get_option( 'bing_api_key' );
	if ( empty( $api_key ) ) {
		wp_send_json_error( array( 'message' => '请先填写 Bing API Key' ) );
	}

	// Fetch posts without featured images (up to 10 at a time)
	$posts = get_posts( array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 10,
		'meta_query'     => array(
			array(
				'key'     => '_thumbnail_id',
				'compare' => 'NOT EXISTS',
			),
		),
	) );

	if ( empty( $posts ) ) {
		wp_send_json_success( array( 'detail' => ' 所有文章已有封面图，无需处理。' ) );
	}

	$done  = 0;
	$fails = 0;
	foreach ( $posts as $post ) {
		$query = wp_strip_all_tags( $post->post_title );
		$urls  = zs_bing_search_images( $api_key, $query, 1, 'Wide' );
		if ( empty( $urls ) ) {
			$fails++;
			continue;
		}
		$att_id = zs_sideload_image( $urls[0], $post->ID, $query );
		if ( $att_id ) {
			set_post_thumbnail( $post->ID, $att_id );
			$done++;
		} else {
			$fails++;
		}
	}

	wp_send_json_success( array(
		'detail' => " 成功 {$done} 篇，失败 {$fails} 篇。",
	) );
}
add_action( 'wp_ajax_zs_fetch_post_images', 'zs_ajax_fetch_post_images' );