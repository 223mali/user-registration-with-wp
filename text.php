

 <form method="post" class="woocommerce-form woocommerce-form-register register"

	<div class="form-row m-b-55">
		<div class="name">Name</div>
		<div class="value">
			<div class="row row-space">
				<div class="col-6">
					<div class="input-group-desc">
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="text" class="input--style-5 woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="first_name"
						id="reg_first_name"
						value="' . ( isset( $_POST['first_name'] ) ? $first_name : null ) . '" />
				</p>
						<label class="label--desc">first name <span
				class="required">*</span></label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group-desc">
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="text" class="input--style-5 woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="last_name"
						id="reg_last_name"
						value="' . ( isset( $_POST['last_name'] ) ? $last_name : null ) . '" />
				</p>
						<label class="label--desc">last name <span
				class="required">*</span></label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-row">
		<div class="name">Email</div>
		<div class="value">
			<div class="input-group">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="email" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="email"
						id="reg_username"
						value="' . ( isset( $_POST['email'] ) ? $email : null ) . '" />
				</p>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="name">Password</div>
		<div class="value">
			<div class="input-group">
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<input type="password" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="password"
			id="reg_password" autocomplete="new-password" />
	</p>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="name">Cell Phone</div>
		<div class="value">
			<div class="input-group">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="tel" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="phone"
						id="reg_phone"
						value="' . ( isset( $_POST['phone'] ) ? $phone : null ) . '" />
				</p>
			</div>
		</div>
	</div>

	<div class="form-row">
		<div class="name">Date of Birth</div>
		<div class="value">
			<div class="input-group date">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input data-provide="datepicker" type="text" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="dob"
						id="reg_dob" onkeydown="return false"
						value="' . ( isset( $_POST['phone'] ) ? $phone : null ) . '" />
						<div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
						
				</p>
			</div>
		</div>
	</div>

	<div class="form-row p-t-20">
		<label class="label label--block">Are you an existing customer? <span
				class="required">*</span></label>
		<div class="p-t-15">
			<label class="radio-container m-r-55">Yes
				<input type="radio" checked="checked" name="exist">
				<span class="checkmark"></span>
			</label>
			<label class="radio-container">No
				<input type="radio" name="exist">
				<span class="checkmark"></span>
			</label>
		</div>
	</div>

	

	<p class="woocommerce-form-row form-row">
		<button type="submit" class=" btn btn-primary woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
			name="register"
			value="">Register</button>
	</p>

	

</form>