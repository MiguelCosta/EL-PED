
<div id="login">
   <?php
	  $dir = "forms/";
	  if (basename(getcwd()) != 'PED-Project') $dir = "../forms/";
	echo "<form action=\"".$dir."login_answer.php\" method=\"post\" name=\"loginForm\">";
   ?>
        <div id="login_form">
            <label>Username:</label> 
            <input type="text" 
                   id="username" 
                   required 
                   name="username"/>

            <div class="clr"></div>

            <label>Password:</label> 
            <input type="password" 
                   id="password" 
                   required 
                   name="password"/>

            <div class="clr"></div>

        </div>
        <input id="login_btn" type="submit" value="Login"/>

    </form>
</div>
