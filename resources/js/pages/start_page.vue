<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="signup-form">
				<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#007bff" viewBox="0 0 16 16">
					<path
						d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
				</svg>
				<h3>Let's begin</h3>
				<p>We'll verfy your details</p>
				<hr>
				<div class="col-md-12 text-center">
					<p v-if="errors.length">
						<b>Please correct the following error(s):</b>
					<ul class="list-group">
						<li v-for="error in errors" class="list-group-item list-group-item-danger">{{ error }}</li>
					</ul>
					</p>
				</div>
				<form @submit="login">
					<div class="form-group">
						<label for="customer_id">Customer ID</label>
						<input v-model="form.customer_id" type="text" class="form-control" placeholder="Ex. 123456789">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
					</div>
				</form>
				<p>Your first time? <router-link to="/registration_page">click here!</router-link>
				</p>
				<div class="modal fade" id="modalSuspend" tabindex="-1" role="dialog" aria-labelledby="modalSuspendlLabel" aria-hidden="true">Suspend action for 30 seconds</div>
			</div>
		</div>
	</div>
</template>
<script>
import { Modal } from "bootstrap";
export default {
	data() {
		return {
			form: {
				customer_id: ''
			},
			errors: {},
			clicks: 0,
			success: false
		}
	},
	methods: {
		login: function (e) {
			e.preventDefault();
			this.errors = [];

			axios.post('/login', this.form)
				.then(() => {
					console.log('success');
					this.$router.push("/verification_page");
				})
				.catch((error) => {
					let errors = Object.values(error.response.data.errors).flat();
					errors.forEach((element) => {
						console.log(element);
						this.errors.push(element);
					});

					this.clicks++;
					if (this.clicks > 5) {
						this.showUniqueModal();
					}
				});
		},
		registration: function (e) {
			this.$router.push("/registration_page");
		},
		showUniqueModal() {
			this.modalSuspend = new Modal(document.getElementById("modalSuspend"), { keyboard: false });
			this.modalSuspend.show();

			setTimeout(function() {
				this.clicks = 0;
				window.location.reload();
			}, 30000);
		}
	}
}
</script>