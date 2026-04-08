<?php

namespace App\Support;

class SanitizeHtml
{
    /**
     * Strip unsafe tags and attributes for admin-edited rich text (bold, paragraphs, headings).
     */
    public static function aboutDescription(string $html): string
    {
        $allowed = '<p><br><b><strong><i><em><u><h2><div><ul><ol><li><span>';
        $clean = strip_tags($html, $allowed);

        return preg_replace('/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*>/', '<$1>', $clean) ?? $clean;
    }
}
