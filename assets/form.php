<?php
function contact_form()
{

       $content = '';
       $content .= '<h2>Contact us!<h2>';
       $content .= '<form method="post">';

       $content .= '<label for="your_name">Name</label>';
       $content .= '<input type="text" name="your_name" class="form-control" placeholder="Enter your name" required/>';

       $content .= '<label for="your_email">Email</label>';
       $content .= '<input type="email" name="your_email" class="form-control" placeholder="Enter your email" required/>';

       $content .= '<label for="your_description">Description</label>';
       $content .= '<textarea name="your_description" class="form-control" placeholder="Enter your description" required></textarea>';

        $content .= '<label for="your_img">Select a file:</label>';
       $content .= '<br /><input type="file" multiple class="form-control"  id="your_img" name="your_img" value="upload images">';

       $content .= '<br /><input type="submit" name="contact_form_submit" class="btn btn-dm btn-primary" value="Send your informations" />';
       $content .= '</form>';
       return $content;

}

add_shortcode('form', 'contact_form');
?>
