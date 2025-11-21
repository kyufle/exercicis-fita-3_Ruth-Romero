<?php
$filename = 'text.txt';
$comparison_result = '';

if (isset($_POST['text_input']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_text = trim($_POST['text_input']);
    $file_exists_and_not_empty = file_exists($filename) && @filesize($filename) > 0;

    if ($file_exists_and_not_empty) {
        $saved_text = file_get_contents($filename);
        $clean_and_get_words = function($text) {
            $text = strtolower($text);
            $text = preg_replace('/[^a-z0-9\s]/', '', $text);
            return array_filter(explode(' ', $text));
        };
        
        $saved_words = $clean_and_get_words($saved_text);
        $new_words = $clean_and_get_words($new_text);
        $common_words = array_intersect($saved_words, $new_words);
        
        if (!empty($common_words)) {
            $unique_common_words = array_unique($common_words);
            
            $comparison_result .= '<ul>'; 
            
            foreach ($unique_common_words as $word) {
                $comparison_result .= '<li>Paraula coincident: ' . htmlspecialchars($word) . '</li>'; 
            }
            
            $comparison_result .= '</ul>'; 
            
           
        } else {
            $comparison_result = "<p>No s'ha trobat paraules coincidents.</p>";
        }
        
        file_put_contents($filename, '');


    } else {
        if (!empty($new_text)) {
            file_put_contents($filename, $new_text);
        } else {
             $comparison_result = '<h3>Error</h3><p>El camp de text no pot estar buït.</p>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardar y Comparar Texto PHP</title>
</head>
<body>

    <h2>Fita 3 - arxius</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <textarea name="text_input" placeholder="Escribe tu texto aquí..."></textarea>
        <button type="submit">Tramet consulta</button>
    </form>

    <?php 
    if (!empty($comparison_result)) {
        echo '<div class="comparison-output">' . $comparison_result . '</div>';
    }
    ?>

</body>
</html>