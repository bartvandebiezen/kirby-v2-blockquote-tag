<?php

/**
 * Blockquote Tag
 *
 * Generates HTML5 blockquotes based on 'cite and blockquote – reloaded' from
 * HTML5 Doctor http://html5doctor.com/cite-and-blockquote-reloaded/. Includes
 * BEM style classes: .blockquote, .blockquote__quote, .blockquote__footer,
 * .blockquote__attribution, and .blockquote__link for complete control.
 *
 * You can use the KirbyText tag in your text as: (blockquote: your blockquote
 * text language: two-letter language code such as 'en' or 'nl' attribution: for
 * reference to a person or website link: URL given to the attribution).
 * @author    Bart van de Biezen <bart@bartvandebiezen.com>
 * @link      https://github.com/bartvandebiezen/kirby-v2-blockquote-tag
 * @return    HTML
 * @version   0.2 Optional custom class
 */

kirbytext::$tags['blockquote'] = array (

	'attr' => array(
		'class',
		'language',
		'attribution',
		'link',
	),

	'html' => function($tag) {

		$quote = $tag->attr('blockquote');
		$class = $tag->attr('class', 'blockquote');
		$language = $tag->attr('language');
		$attribution = $tag->attr('attribution');
		$link = $tag->attr('link');

		// Start blockquote with the optional language attribute
		$buffer = '<blockquote class="' . $class . '"';
		if ($language) { $buffer .= ' lang="' . $language . '"'; }
		$buffer .= '>' . "\n";

		// The quote itself
		$buffer .= '<div class="' . $class . '__quote">' . kirbytext($quote) . '</div>' . "\n";

		// When attribution or link is available, place it as a cite in the blockquote footer
		if ($attribution or $link) {
			$buffer .= '<footer class="' . $class . '__footer">'. "\n" . '<cite class="' . $class . '__attribution">';
			if ($attribution and $link) {
				$buffer .= '<a class="' . $class . '__link" href="' . $link . '">' . $attribution . '</a>';
			} elseif ($attribution) {
				$buffer .= $attribution;
			} elseif ($link) {
				$buffer .= '<a class="' . $class . '__link" href="' . $link . '">' . $link . '</a>';
			}
			$buffer .= '</cite>' . "\n" . '</footer>' . "\n";
		}

		// End blockquote
		$buffer .= '</blockquote>' . "\n";

		// Output buffer
		return $buffer;
	}
);
?>
