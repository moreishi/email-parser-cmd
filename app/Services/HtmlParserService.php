<?php

namespace App\Services;

class HtmlParserService {

    /**
     * Strip all the content between Start an dend Marker.
     */
    public static function parseContentType($document, $start_marker, $end_marker ) {

        // Find positions of start and end markers
        $start_pos = strpos($document, $start_marker);
        $end_pos = strpos($document, $end_marker, $start_pos);

        // Initialize variable to store extracted content
        $content = '';

        // If both markers are found
        if ($start_pos !== false && $end_pos !== false) {
            // Calculate start position after the marker
            $start_pos += strlen($start_marker);

            // Extract the content between the markers
            $content = substr($document, $start_pos, $end_pos - $start_pos);

            // Trim any leading or trailing whitespace
            $content = trim($content);
            
            // Output the extracted content
            return $content;
        } 

        return $document;

    } 

    /**
     * Strip a all the content before the pattern marker
     * return @string
     */
    public static function removeStringBefore($document, $pattern) {

        // Remove all text before the first occurrence of "From: "
        $posFrom = strpos($document, $pattern);
        
        $input = '';
        
        if ($posFrom !== false) {
            $input = substr($document, $posFrom);
        }

        return $input;

        
    }

    public static function removeContentPattern($document, $pattern) {

        $pos = strpos($document, $pattern);

        if ($pos !== false) 
            return substr($document, $pos + strlen($pattern));
        
        return $document;
    }

    public static function removeStringFrom($document, $pattern) {
        
        $posDash = strpos($$document, $pattern);
        
        if ($posDash !== false) return substr($document, 0, $posDash);

        return $document;
    }

}