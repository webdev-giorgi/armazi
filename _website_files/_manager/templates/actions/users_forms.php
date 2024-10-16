<?php defined('DIR') OR exit; ?>
    <div id="title" class="fix">
        <div class="icon"><img src="_manager/img/aduser.png" width="16" height="16" alt="" /></div>
        <div class="name"><?php echo $title;?></div>
    </div>

    <div id="box">
        <div id="part">
            <div id="top" class="fix">
			</div>
			<div id="news">
<?php $ulink = ($route[1]=="add") ? ahref(array($route[0], 'add')) : ahref(array($route[0], 'edit', $id)); ?>
                <form id="catform" method="post" action="<?php echo $ulink;?>">
                   	<input type="hidden" name="users_form_submit" value="1" />
                    <input type="hidden" name="tabstop" id="tabstop" value="edit" />
					<div class="list fix">
						<div class="icon"><a href="#"><img src="_manager/img/minus.png" width="16" height="16" alt="" /></a></div>
						<div class="title"><?php echo $title;?>:</div>
					</div>

					<div class="list2 fix">
						<div class="name"><?php echo a("username");?>: <span class="star">*</span></div>
						<input type="text" name="username" id="username" value="<?php echo ($route[1]=="edit") ? $username : '' ;?>" class="inp-small"/>
						<div class="name"><?php echo a("email");?>: <span class="star">*</span></div>
						<input type="text" name="email" id="email" value="<?php echo ($route[1]=="edit") ? $email : '' ;?>" class="inp-small"/>
					</div>

					<div class="list fix">
						<div class="name"><?php echo a("password");?>: <span class="star">*</span></div>
						<input type="password" name="password" id="password" value="" class="inp-small"/>
						<div class="name"><?php echo a("repassword");?>: <span class="star">*</span></div>
						<input type="password" name="password2" id="password2" value="" class="inp-small"/>
					</div>

					<div class="list2 fix">
						<div class="name"><?php echo a("firstname");?>: </div>
						<input type="text" name="firstname" id="firstname" value="<?php echo ($route[1]=="edit") ? $firstname : '' ;?>" class="inp-small"/>
						<div class="name"><?php echo a("lastname");?>: </div>
						<input type="text" name="lastname" id="lastname" value="<?php echo ($route[1]=="edit") ? $lastname : '' ;?>" class="inp-small"/>
					</div>

					<div class="list fix">
						<div class="name"><?php echo a("usergroup");?>: </div>
						<select name="usercat" id="usercat" class="inp-small">
                        	<option value="Administrator" <?php echo (($route[1]=="edit")&&($usercat=='Administrator')) ? 'selected' : '' ;?>><?php echo a("administrator");?></option>
                        	<option value="User" <?php echo (($route[1]=="edit")&&($usercat=='User')) ? 'selected' : '' ;?>><?php echo a("user");?></option>
                        	<option value="Guest" <?php echo (($route[1]=="edit")&&($usercat=='Guest')) ? 'selected' : '' ;?>><?php echo a("guest");?></option>
                        </select>
					</div>

					<div class="list2 fix">
						<div class="name"><?php echo a("active");?>: </div>
						<input type="checkbox" name="active" id="active" <?php echo (($route[1]=="add")||(($route[1]=="edit")&&($active=='1'))) ? 'checked' : '' ;?> />
					</div>
				</form>

            </div>
            <div id="bottom" class="fix">
                <a href="javascript:save('edit');" class="button br"><?php echo a("save");?></a>
                <a href="javascript:save('close');" class="button br"><?php echo a("save&close");?></a>
                <a href="<?php echo ahref(array($route[0])); ?>" class="button br"><?php echo a("cancel");?></a>
            </div>
        </div>
    </div>
<script language="javascript">
	function save(action) {
        $("#tabstop").val(action);
		var validate = 1;
		var msg = "";
		if($("#username").val()=='') {
			msg = "<?php echo a('error.username');?>";
			validate = 0;
		} else if($("#email").val()=='') {
			msg = "<?php echo a('error.email');?>";
			validate = 0;
<?php if($route[1]=="add") { ?>
		} else if($("#password").val()=='') {
			msg = "<?php echo a('error.password');?>";
			validate = 0;
<?php } ?>
		} else if($("#password").val()!=$("#password2").val()) {
			msg = "<?php echo a('error.repassword');?>";
			validate = 0;
		}
		if(validate == 1) {
			this.catform.submit();
		} else {
			alert(msg);
		}
	}
</script>
