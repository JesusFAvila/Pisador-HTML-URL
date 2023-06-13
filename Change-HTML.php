<?php
  function change_html_element() {
      // Obtén la URL actual
      $current_url = home_url( add_query_arg( NULL, NULL ) );

      // Define los textos y los tipos de elementos para cada elemento
      $elements = array(
          "seoh1function" => array(
              "htmlTag" => "h1",
              "en" => "Boat tours to Isla de los Lobos",
              "es" => "Visitas en barco a Isla de los Lobos"
          ),
          // Añade más elementos aquí
           "seoh2function-ferrys" => array(
              "htmlTag" => "h2",
              "en" => "Activities in Corralejo",
              "es" => "Excursiones a Isla de los Lobos"
          ),
      // Añade más elementos aquí

      );

      // Verifica si la URL contiene '/en/'
      $lang = (strpos($current_url, '/en/') !== false) ? "en" : "es";

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
