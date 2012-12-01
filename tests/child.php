<?php ui_extends("tests/Master.php") ?>

<?php ui_block("title") ?>
I'm titled 
<?php ui_block() ?>

<?php ui_block("heading") ?>
I am the true Heading!
<?php ui_block() ?>

<?php ui_block("body") ?>
<p>
    Giving you a cool 
    <strong><?php echo $this->greeting ?></strong>
</p>
<p>
    Overriding the variable <code>newVar</code>.
    <?php $this->newVar = "Box with Apples" ?>
</p> 

and this is my dad's original body: 
<blockquote><?php ui_parent() ?></blockquote>

<?php ui_include("tests/neighbor.php") ?>
<?php ui_block() ?>