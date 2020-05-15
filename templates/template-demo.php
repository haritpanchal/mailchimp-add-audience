<?php 
    /* Template Name: Custom Template */ 
    /* Template Post Type: post, page */
?>

<?php wp_head(); ?>

<html>
    <head>
        <title>HTML Table</title>
    </head>
    <body>
        <form method="" action="">
            <table border="1" align="center" width="400" bgcolor="#CCCCCC" >
            <caption>Register Subscriber</caption>
                <tr>
                    <th>
                        Enter first name
                    </th>
                    <td><input type="text" name="firstname" id="firstname" maxlength="10" title="enter your first name" placeholder="First name" autocomplete="off"/></td>
                </tr>
                <tr>
                    <th>
                        Enter last name
                    </th>
                    <td><input type="text" name="lastname" id="lastname" maxlength="10" title="enter your first name" placeholder="Last name" autocomplete="off"/></td>
                </tr>
                <tr>
                    <th>
                        Enter email
                    </th>
                    <td><input type="email" name="email" id="email"  title="enter your first name" placeholder="Email" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td><input type="button" class='submit' value="Add Subcriber"></td>
                    <td>
                        <span style="display: none" class = "msg">User added successfully</span>
                        <span style="display: none" class = "error">User already exists</span>
                    </td>
                </tr>
            </table>
            <input type="image" class = "image" style="display:none; height:50px " src="<?php echo get_template_directory_uri().'/download.gif'  ?>" alt="">
        </form>
    </body>
</html>
    
<?php wp_footer(); ?>