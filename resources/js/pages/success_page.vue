<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="signup-form">
				<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#28a745" viewBox="0 0 16 16">
					<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
					<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
				</svg>
				<h3>Complete Registration</h3>
				<p>Hey dude! Welcome to Loan In Click, please check Your mailbox and confirm account</p>
				<hr>
				<form @submit="back" id="back">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Back to Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	methods: {
		back: function (e) {
			this.$router.push("/start_page");
		}
	}
}
</script>