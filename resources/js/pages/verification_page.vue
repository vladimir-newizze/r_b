<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="signup-form">
				<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#007bff" viewBox="0 0 16 16">
					<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
				</svg>
				<h3>Verification</h3>
				<p>Check your Phone {{ true }} and put the verification code here</p>
				<hr>
				<div class="col-md-12 text-center">
					<p v-if="errors.length">
						<b>Please correct the following error(s):</b>
						<ul class="list-group">
							<li v-for="error in errors" class="list-group-item list-group-item-danger">{{ error }}</li>
						</ul>
					</p>
				</div>
				<form @submit="verification" id="verification">
					<div class="form-group">
						<input v-model="form.code" type="numeric" class="form-control" maxlength="5" size="5" placeholder="00000">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Confirm</button>
					</div>
				</form>
				<p>Don't get? <router-link to="/">Resend code</router-link></p>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	data() {
        return {
            form: {
                customer_id: ''
            },
			errors: {},
        	success: false
        }
    },
	methods: {
		verification: function (e) {
			e.preventDefault();
			this.errors = [];

			axios.post('/verification', this.form)
				.then(() => {
					console.log('success');
					this.$router.push("/success_page");
				})
				.catch((error) => {
					let errors = Object.values(error.response.data.errors).flat();
					errors.forEach((element) => {
						console.log(element);
						this.errors.push(element);
					});
				});
		},
	}
}
</script>