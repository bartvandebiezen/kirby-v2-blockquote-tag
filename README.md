# Blockquote tag for Kirby 2

Generates HTML5 blockquotes based on ['cite and blockquote – reloaded' from HTML5 Doctor](http://html5doctor.com/cite-and-blockquote-reloaded/). Includes BEM style classes for complete styling control.

## Installation

1. Copy ‘blockquote.php’ inside ‘tags’ to Kirby’s ‘site/tags/‘ folder.

## Usage

The following attributes are available:

- **blockquote**: your blockquote text.
- **class**: class given to the blockquote and used for naming the child elements. If no class is given, it will be 'blockquote'.
- **language**: language code such as 'en' or 'nl'.
- **attribution**: for reference to a person or website.
- **link**: URL given to attribution.

You can use this KirbyText tag in your text as:

```
(blockquote: Here's to the crazy ones. The misfits. The rebels. The troublemakers. The round pegs in the square holes. The ones who see things differently. They're not fond of rules. And they have no respect for the status quo. You can quote them, disagree with them, glorify or vilify them. About the only thing you can't do is ignore them. Because they change things. They push the human race forward. And while some may see them as the crazy ones, we see genius. Because the people who are crazy enough to think they can change the world, are the ones who do. language: en attribution: Apple Inc.
 link: http://www.apple.com/).
```

Output will be:
```html
<blockquote class="blockquote" lang="en">
<div class="blockquote__quote"><p>Here's to the crazy ones. The misfits. The rebels. The troublemakers. The round pegs in the square holes. The ones who see things differently. They're not fond of rules. And they have no respect for the status quo. You can quote them, disagree with them, glorify or vilify them. About the only thing you can't do is ignore them. Because they change things. They push the human race forward. And while some may see them as the crazy ones, we see genius. Because the people who are crazy enough to think they can change the world, are the ones who do.</p></div>
<footer class="blockquote__footer">
<cite class="blockquote__attribution"><a class="blockquote__link" href="http://www.apple.com/">Apple Inc.</a></cite>
</footer>
</blockquote>
```
