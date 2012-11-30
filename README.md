RAW PHP TEMPLATE ENGINE
=======================

This is an experimental template engine which mimics some features of others but
without a temlpating language like in twig or smarty.

For now, the very first feature created is a simple template inheritance. 

You can see an example in the ```index.php``` file where we instantiate the engine
and then give it a file to render. 

The renderable files (or views) are in the ```tests``` folder. Here you can see
a views hierarchy.

### Known Issues

* The template engine doesn't manage a list of routes to the files, like smarty,
but hey, I made this in half a day! there is a lot of things to do.

* The template inheritance is very simple so the child templates cannot create
nested blocks.

* I can't get rid of the content around the thildren's block, so is up to you to
keep the things clean.