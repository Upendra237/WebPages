<?php
function load_json($file) {
    $path = __DIR__ . '/../data/' . $file;
    if (!file_exists($path)) return [];
    return json_decode(file_get_contents($path), true) ?? [];
}

function site_data() {
    return load_json('site.json');
}

function current_page() {
    $uri = strtok($_SERVER['REQUEST_URI'], '?');
    $uri = rtrim($uri, '/');
    if ($uri === '' || $uri === '/') return 'home';
    return ltrim($uri, '/');
}

function is_active($page) {
    return current_page() === $page ? 'text-orange-600 font-700' : '';
}

function stars($rating) {
    $html = '';
    for ($i = 0; $i < 5; $i++) {
        $color = $i < $rating ? '#E8630A' : '#E8E4DC';
        $html .= '<svg width="14" height="14" viewBox="0 0 24 24" fill="'.$color.'" style="display:inline-block"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
    }
    return $html;
}

function meta_tags($title, $desc, $canonical = '') {
    $site = site_data();
    $full_title = $title . ' | ' . $site['name'];
    echo '<title>' . htmlspecialchars($full_title) . '</title>' . "\n";
    echo '<meta name="description" content="' . htmlspecialchars($desc) . '">' . "\n";
    echo '<meta property="og:title" content="' . htmlspecialchars($full_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . htmlspecialchars($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    if ($canonical) {
        echo '<link rel="canonical" href="' . htmlspecialchars($canonical) . '">' . "\n";
    }
}
?>
