
		<h1><a href="index.html"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class='retina-ready'></a></h1>
		<div class="login-body">
			<h2>SIGN IN</h2>
			<?php print form_open('auth/login',array('class'=>'horizontal'))?>
				<div class="email">
					<input type="text" name='login_field' placeholder="Email address" class='input-block-level' value="<?php print set_value("login_field")?>"/>
				</div>
				<div class="pw">
					<input type="password" name="password" placeholder="Password" class='input-block-level'>
				</div>
				<div class="submit">
					<input type="submit" class="btn btn-primary" value="Sign me in" class='btn btn-primary'>
				</div>
			<?php print form_close()?>
			<div class="forget">
				<a href="http://www.mirus.in" target="_blank"><span>Mirus Solutions Pvt. Ltd.</span></a>
			</div>
		</div>
	</div>