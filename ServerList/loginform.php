 <form action="<?php echo $site;?>/serverlist/login.php" method="post" id="login-form" >

<table>
    <tr>
        <td>Username:</td>
	<td><input id="modlgn-username" type="text" name="username" class="inputbox"  size="18" /></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18"  /></td>
    </tr>
    <tr><td></td>
        <td><input type="submit" name="Submit" class="button" value="Log in" />
        </td><tr>
</table>
	<ul>		
				<li>
			<a href="<?php echo $site?>forum/ucp.php?mode=register">
				Create an account</a>
		</li>
			</ul>
	</form>