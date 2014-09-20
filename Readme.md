# Spammer Killer

A lightweight WordPress plugin to kill comment spam.

## How to use it

Insert the spammer-killer folder (or just the spammer-killer.php file) into your wp-content/plugins directory. Log in to WordPress, go to your Plugins page, and activate the plugin.

Boom! No more spam comments!

## How it works

This is your basic antispam honeytrap. You see, spambots tend to fill out every field in a web form. So, we just put a little text field in there, hide it with CSS, and check it before processing the comment. If it contains a value, we presume a spambot filled out the form and we stop the comment right there.

## That's it?

Yep. And I'd say it's 99% effective, although I have no real data to back me up on that. Do remember that it won't stop real people writing spammy comments on your blog, but it's pretty good at getting the bulk of the spam.

Enjoy!

## Questions

### I've activated the plugin and the hidden field doesn't get inserted to my comment form.

First, make sure that you've checked the source or in your web inspector and verified that the field
isn't in your comment form. It should be called "ajy-extra-field", so you can search for that.

Sometimes this happens because a theme might implement their own comment form code, which could skip
the action hooks I'm using to insert the hidden field. In this case, here's what I'd recommend:

* Find where your theme has implemented the comment form
* Use the HTML code from `function ajy_spam_field()` to manually add the field to your comment form.
* Go ahead and activate the plugin, since the function to kill the spam submission will take effect
anyway

This should do the trick for you.
