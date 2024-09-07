<?php
?>
<h1>Sign up</h1>
<div class="page-content hide-navbar-on-scroll">
  <form class="list" id="register-form"  >
		<ul>
      <li id="FirstNameDiv">
        <div class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">First Name</div>
            <div class="item-input-wrap">
              <input type="text" name="firstName" id="firstName" placeholder="First Name" required validate >
            </div>
          </div>
        </div>
      </li>
      <li id="LastNameDiv">
        <div class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Last Name</div>
            <div class="item-input-wrap">
              <input type="text" name="lastName" id="lastName" placeholder="Last Name" required validate >
            </div>
          </div>
        </div>
      </li>
      <li id="MobileDiv">
        <div class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Mobile Number</div>
            <div class="item-input-wrap">
              <input type="number" name="mobile" id="mobile" placeholder="Mobile Number" required validate pattern="[0-9]*" data-error-message="Only numbers please!" max="9999999999" min="1000000000">
            </div>
          </div>
        </div>
      </li>
							<li>
									<div class="item-content item-input">
											<div class="item-inner">
													<div class="item-title item-label">E-mail</div>
													<div class="item-input-wrap">
															<input type="email" name="email" id="email" placeholder="e-mail@domain.com" required validate>
													</div>
											</div>
									</div>
							</li>
	      <li>
        <div class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Date of Birth</div>
            <div class="item-input-wrap">
              <input type="date" name="dateofbirth" placeholder="Choose..." value="2000-05-31" required validate>
            </div>
          </div>
        </div>
      </li>
		</ul>
		<div class="" id="submit">
		      <div class="block block-strong block-outline-ios">
			          <button class="button button-tonal button-round button-fill">Round</button>
			</div>
  </div>
		    <div class="page-content">
			<a href="#" onclick="return RegisterMe();" class="button s24" >Register</a>
		</div>
		</form>
