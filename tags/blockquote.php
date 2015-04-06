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
 * @version   0.1 initial release
 */

kirbytext::$tags['blockquote'] = array (

	'attr' => array(
		'language',
		'attribution',
		'link',
	),

	'html' => function($tag) {

		$quote = $tag->attr('blockquote');
		$language = $tag->attr('language');
		$attribution = $tag->attr('attribution');
		$link = $tag->attr('link');

		// Set language in its attribute
		if($language) {
			$languageAttribute = ' lang="' . $language . '"';
		} else {
			$languageAttribute = '';
		}

		// Start blockquote with the optional language attribute
		$buffer = '<blockquote class="blockquote"' . $languageAttribute . '>' . "\n";

		// The quote itself
		$buffer .= '<div class="blockquote__quote">' . kirbytext($quote) . '</div>' . "\n";

		// When attribution or link is available, place it as a cite in the blockquote footer
		if ($attribution or $link) {
			$buffer .= '<footer class="blockquote__footer">'. "\n" . '<cite class="blockquote__attribution">';
			if ($attribution and $link) {
				$buffer .= '<a class="blockquote__link" href="' . $link . '">' . $attribution . '</a>';
			} elseif ($attribution) {
				$buffer .= $attribution;
			} elseif ($link) {
				$buffer .= '<a class="blockquote__link" href="' . $link . '">' . $link . '</a>';
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
