 <!-- -Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content login-modal">
	      		<div class="modal-header login-modal-header label-primary">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title text-center" id="loginModalLabel"><font color="#FFFFFF">Accede a Nuestros Sistemas</font></h4>
	      		</div>
	      		<div class="modal-body">
	      			<div class="text-center">
		      			<div role="tabpanel" class="login-tab">
						  	<!-- Nav tabs -->
						  	<ul class="nav nav-tabs" role="tablist">
						    	<li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">Acceder</a></li>
						    	<li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Registrate</a></li>
						    	<li role="presentation"><a id="forgetpass-taba" href="#forget_password" aria-controls="forget_password" role="tab" data-toggle="tab">Olvidaste tu Clave</a></li>
						  	</ul>
						
						  	<!-- Tab panes -->
						 	<div class="tab-content">
						    	<div role="tabpanel" class="tab-pane active text-center" id="home">
						    		&nbsp;&nbsp;
						    		<span id="login_fail" class="response_error" style="display: none;">Acceso fallido. Por favor intente nuevamente.</span>
						    		<div class="clearfix"></div>
						    		<form name="frmLogin"  method="post" action="../login.php">
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-user"></i></div>
									      		<input type="text" class="form-control" name="txtDni" id="login_username" placeholder="@Email" required>
                                                <input type="hidden" class="form-control" name="arance" id="arance" value="arancel">
									    	</div>
									    	<span class="help-block has-error" id="email-error"></span>
									  	</div>
									  	<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-lock"></i></div>
									      		<input type="password" class="form-control" name="txtCla" id="password" placeholder="Password" required>
									    	</div>
									    	<span class="help-block has-error" id="password-error"></span>
									  	</div>
							  			<button type="submit" id="login_btn" class="btn btn-primary btn-block bt-login" data-loading-text="Signing In....">Ingresar</button>
							  			<div class="clearfix"></div>
							  			<div class="login-modal-footer">
							  				<div class="row">
												<div class="col-xs-8 col-sm-8 col-md-8">
													<i class="fa fa-lock"></i>
													<a href="javascript:;" class="forgetpass-tab"> Se te olvid&oacute; tu contrase&ntilde;a? </a>
												
												</div>
												
												<div class="col-xs-4 col-sm-4 col-md-4">
													<i class="fa fa-check"></i>
													<a href="javascript:;" class="signup-tab"> Reg&iacute;strate </a>
												</div>
											</div>
							  			</div>
									</form>
						    	</div>
						    	<div role="tabpanel" class="tab-pane" id="profile">
						    	    &nbsp;&nbsp;
						    	    <span id="registration_fail" class="response_error" style="display: none;">Falló el registro, por favor, inténtelo de nuevo.</span>
						    		<div class="clearfix"></div>
						    		<form name="formPersonal" method="post" action="../correo.php">
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-user"></i></div>
									      		<input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombres" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
                                        <div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-user"></i></div>
									      		<input type="text" class="form-control" name="txtApellido" placeholder="Apellidos" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
									  	<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-at"></i></div>
									      		<input type="email" class="form-control" name="txtMail" placeholder="@Email" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="remail-error"></span>
									  	</div>
                                        <div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-phone"></i></div>
									      		<input type="text" class="form-control" name="txtCelular" onkeypress="return numeros(event)" placeholder="Nro. Celular" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
                                        <div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-home"></i></div>
									      		<input type="text" class="form-control" name="txtDireccion" placeholder="Direcci&oacute;n" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
                                        <div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-bank"></i></div>
									      		<input type="text" class="form-control" name="txtEmpresa" placeholder="Empresa / Instituci&oacute;n" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
							  			<button type="submit" id="register_btn" class="btn btn-primary btn-block bt-login" data-loading-text="Registering....">Reg&iacute;strate</button>
										<div class="clearfix"></div>
										<div class="login-modal-footer">
							  				<div class="row">
												<div class="col-xs-8 col-sm-8 col-md-8">
													<i class="fa fa-lock"></i>
													<a href="javascript:;" class="forgetpass-tab"> Se te olvid&oacute; tu contrase&ntilde;a? </a>
												
												</div>
												
												<div class="col-xs-4 col-sm-4 col-md-4">
													<i class="fa fa-check"></i>
													<a href="javascript:;" class="signin-tab"> Acceder </a>
												</div>
											</div>
							  			</div>
									</form>
						    	</div>
						    	<div role="tabpanel" class="tab-pane text-center" id="forget_password">
						    		&nbsp;&nbsp;
						    	    <span id="reset_fail" class="response_error" style="display: none;"></span>
						    		<div class="clearfix"></div>
						    		<form name="formrecuperaclave" method="post" action='../recoveryclave.php'>
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
									      		<input type="email" class="form-control" name="txtOlvClaAV" id="email" placeholder="Ingresa tu @Email" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="femail-error"></span>
									  	</div>
									  	
							  			<button type="submit" id="reset_btn" class="btn btn-primary btn-block bt-login" data-loading-text="Please wait....">Enviar Correo</button>
										<div class="clearfix"></div>
										<div class="login-modal-footer">
							  				<div class="row">
												<div class="col-xs-6 col-sm-6 col-md-6">
													<i class="fa fa-lock"></i>
													<a href="javascript:;" class="signin-tab"> Acceder </a>
												
												</div>
												
												<div class="col-xs-6 col-sm-6 col-md-6">
													<i class="fa fa-check"></i>
													<a href="javascript:;" class="signup-tab"> Reg&iacute;strate </a>
												</div>
											</div>
							  			</div>
									</form>
						    	</div>
						  	</div>
						</div>
	      				
	      			</div>
	      		</div>
	      		
	    	</div>
	   </div>
 	</div>
 	<!-- - Login Model Ends Here -->