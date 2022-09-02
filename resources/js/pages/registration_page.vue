<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="signup-form">
				<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#007bff" viewBox="0 0 16 16">
					<path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224zM6.105 8.125A.637.637 0 0 1 6.5 8h3a.64.64 0 0 1 .395.125c.085.068.105.133.105.175v2.4c0 .042-.02.107-.105.175A.637.637 0 0 1 9.5 11h-3a.637.637 0 0 1-.395-.125C6.02 10.807 6 10.742 6 10.7V8.3c0-.042.02-.107.105-.175z"/>
					<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
				</svg>
				<h3 class="text-center">Registration</h3>
				<p class="text-center">Create your new account</p>
				<hr>
				<div class="col-md-12 text-center">
					<p v-if="errors.length">
						<b>Please correct the following error(s):</b>
					<ul class="list-group">
						<li v-for="error in errors" class="list-group-item invalid-feedback">{{ error }}</li>
					</ul>
					</p>
				</div>
				<form @submit="registration">
					<div class="form-group">
						<label for="name">Your name</label>
						<input v-model="form.name" type="text" class="form-control" placeholder="Ex. Robert Smith">
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input v-model="form.email" type="email" class="form-control" placeholder="Ex. example@mail.com">
					</div>
					<div class="form-group">
						<label for="phone">Phone number</label>
						<input v-model="form.phone" type="tel" class="form-control" placeholder="Ex. +972-54-1234567">
					</div>
					<div class="form-group">
						<label class="form-check-label"><input v-model="form.accept" type="checkbox"> I accept the <a href="#">Terms of Conditions</a></label>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Register account</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	data() {
        return {
            form: {
                name: '',
                email: '',
				phone: '',
                accept: ''
            },
			errors: {},
        	success: false
        }
    },
	methods: {
		registration: function (e) {
			e.preventDefault();
			this.errors = [];

			axios.post('/registration', this.form)
                 .then(() => {
                    this.$router.push("/identify_page");
                 })
                 .catch((error) => {
					let errors = Object.values(error.response.data.errors).flat();
					errors.forEach((element) => {
						console.log(element);
						this.errors.push(element);
					});
                 });
		}
	}
}
</script>
