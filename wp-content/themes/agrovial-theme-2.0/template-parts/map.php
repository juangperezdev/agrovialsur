<?php
// Main Map URL
$map_embed_url = get_option('map_embed_url', 'https://maps.google.com/maps?q=-41.1335,-71.3103&z=7&output=embed');
// Query Locations CPT
$locations = [];
$args = [
    'post_type' => 'location',
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order date',
    'order' => 'ASC',
];
$posts = get_posts($args);

// Fallback coordinates (center of map if no locations)
$center_lat = -41.1335;
$center_lng = -71.3103;

if ($posts) {
    foreach ($posts as $post) {
        $lat = get_post_meta($post->ID, '_location_lat', true);
        $lng = get_post_meta($post->ID, '_location_lng', true);
        
        // Use first location as center if available
        if (empty($locations) && !empty($lat) && !empty($lng)) {
             $center_lat = $lat;
             $center_lng = $lng;
        }

        $locations[] = [
            'id' => $post->ID,
            'title' => $post->post_title,
            'address' => get_post_meta($post->ID, '_location_address', true),
            'lat' => $lat,
            'lng' => $lng,
            'mapQuery' => get_post_meta($post->ID, '_location_map_query', true),
        ];
    }
}

// Convert PHP array to JSON for JS
$locations_json = json_encode($locations);
?>
<section id="ubicaciones" class="py-16 bg-muted">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-2 bg-secondary/20 text-secondary-foreground rounded-full text-sm font-medium mb-4">
                ENCUÉNTRANOS
            </span>
            <h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
                Presencia en <span class="text-primary">Río Negro</span>
            </h2>
            <p class="text-muted-foreground max-w-2xl mx-auto">
                Mapa interactivo de nuestras obras y bases operativas en toda la provincia
            </p>
        </div>

        <!-- Location Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <?php foreach ($locations as $index => $location) : ?>
                <div 
                    class="location-card cursor-pointer bg-background p-4 rounded-lg shadow-sm border border-border flex items-start gap-3 hover:shadow-md hover:border-primary/30 transition-all"
                    data-lat="<?php echo esc_attr($location['lat']); ?>"
                    data-lng="<?php echo esc_attr($location['lng']); ?>"
                    data-index="<?php echo esc_attr($index); ?>"
                >
                    <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-primary"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-foreground"><?php echo esc_html($location['title']); ?></h3>
                        <p class="text-sm text-muted-foreground"><?php echo esc_html($location['address']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Interactive Map Container -->
        <div class="rounded-xl overflow-hidden shadow-lg border border-border h-[500px] md:h-[700px]">
             <div id="agrovial-map" style="width: 100%; height: 100%;"></div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mapElement = document.getElementById('agrovial-map');
    if (!mapElement) return;

    const locations = <?php echo $locations_json; ?>;
    const center = { lat: <?php echo floatval($center_lat); ?>, lng: <?php echo floatval($center_lng); ?> };
    let map;
    let markers = [];
    let infoWindow;

    function initMap() {
        if (typeof google === 'undefined' || typeof google.maps === 'undefined' || typeof google.maps.Map === 'undefined' || typeof google.maps.marker === 'undefined') {
            setTimeout(initMap, 100);
            return;
        }

        map = new google.maps.Map(mapElement, {
            zoom: 7,
            center: center,
            mapId: 'DEMO_MAP_ID',
        });

        infoWindow = new google.maps.InfoWindow();

        locations.forEach((loc, index) => {
            if (!loc.lat || !loc.lng) return;
            
            const position = { lat: parseFloat(loc.lat), lng: parseFloat(loc.lng) };
            
            const pin = new google.maps.marker.PinElement({
                background: '#e11d48',
                borderColor: '#881337',
                glyphColor: '#ffffff',
            });

            const marker = new google.maps.marker.AdvancedMarkerElement({
                position: position,
                map: map,
                title: loc.title,
                content: pin
            });
            
            pin.style.cursor = 'pointer';
            
            const clickHandler = () => {
                infoWindow.setContent(`
                    <div style="color: #000; padding: 5px;">
                        <h3 style="margin: 0 0 5px 0; font-weight: bold;">${loc.title}</h3>
                        <p style="margin: 0;">${loc.address}</p>
                    </div>
                `);
                infoWindow.open({ anchor: marker, map: map });
            };
            
            marker.addListener('gmp-click', clickHandler);
            marker._handleClick = clickHandler;

            markers.push(marker);
        });
    }

    // Handle Card Clicks
    const cards = document.querySelectorAll('.location-card');
    cards.forEach(card => {
        card.addEventListener('click', () => {
             const index = card.getAttribute('data-index');
             const marker = markers[index];
             
             if (marker) {
                 map.panTo(marker.position);
                 map.setZoom(14);
                 if (marker._handleClick) marker._handleClick();
                 mapElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
             }
        });
    });

    if (window.isGoogleMapsLoaded) {
        initMap();
    } else {
        window.initMapFunctions = window.initMapFunctions || [];
        window.initMapFunctions.push(initMap);
    }
});
</script>
