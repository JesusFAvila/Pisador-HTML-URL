<?php

function change_html_element() {
    // Obtén la URL actual
    $current_url = home_url( add_query_arg( NULL, NULL ) );

    // Define los textos y los tipos de elementos para cada elemento
    $elements = array(
        "seoh1function" => array(
            "htmlTag" => "h1",
            "en" => "Boat tours to Isla de los Lobos",
            "es" => "Visitas en barco a Isla de los Lobos",
            "pl" => "[texto en polaco]",
            "fr" => "[texto en francés]",
            "it" => "[texto en italiano]",
            "de" => "[texto en alemán]"
        ),
        "seoh2function-ferrys" => array(
            "htmlTag" => "h2",
            "en" => "Activities in Corralejo",
            "es" => "Excursiones a Isla de los Lobos",
            "pl" => "[texto en polaco]",
            "fr" => "[texto en francés]",
            "it" => "[texto en italiano]",
            "de" => "[texto en alemán]"
        ),
        // Añade más elementos aquí
    );

    // Determinar el idioma basado en la URL
    if(strpos($current_url, '/en/') !== false){
        $lang = "en";
    } else if(strpos($current_url, '/pl/') !== false){
        $lang = "pl";
    } else if(strpos($current_url, '/fr/') !== false){
        $lang = "fr";
    } else if(strpos($current_url, '/it/') !== false){
        $lang = "it";
    } else if(strpos($current_url, '/de/') !== false){
        $lang = "de";
    } else {
        $lang = "es"; // Si no se encuentra ningún idioma, por defecto a español
    }

    // Imprime el script
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {';
            foreach ($elements as $id => $data) {
                echo 'var element = document.getElementById("' . $id . '"); 
                if (element) {
                    element.outerHTML = "<' . $data["htmlTag"] . ' class=\'' . $id . '\'>" + ' . json_encode($data[$lang]) . ' + "</' . $data["htmlTag"] . '>"; 
                }';
            }
    echo '});
    </script>';
}
add_action('wp_footer', 'change_html_element');

?>
