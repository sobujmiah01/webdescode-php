<?php 
/*
Template Name: Contact Page
*/
get_header();?>
<form action="/submit" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Submit</button>
</form>
<?php get_footer();?>