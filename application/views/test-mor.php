<html>
    <head>
        <title>title</title>
    </head>
    <body>

        		<?php echo form_open('Guide/get_guides_by_parent_email'); ?>
        <input type="text" name="parent_email" placeholder="parent_email">
<!--        <input type="text" name="guide_email" placeholder="guide_email">
         <input type="text" name="subject" placeholder="subject">
         <input type="date" name="date" placeholder="date">-->

			<input type="submit" class="btn" id="loginBtn"">
                        
                        <?php form_close();?>

    </body>
</html>
