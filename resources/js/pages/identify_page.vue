<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="signup-form">
				<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#007bff" viewBox="0 0 16 16">
					<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
					<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
				</svg>
				<h3>Identity Verification</h3>
				<p>We have not save your data, we just verfy you</p>
				<hr>
				<div class="col-md-12 text-center">
					<p v-if="errors.length">
						<b>Please correct the following error(s):</b>
					<ul class="list-group">
						<li v-for="error in errors" class="list-group-item list-group-item-danger">{{ error }}</li>
					</ul>
					</p>
				</div>
				<form @submit="identity">
					<div class="form-group">
						<label for="card">Card number</label>
						<input v-model="form.card" type="text" class="form-control" placeholder="Ex. 0000 0000 0000 0000">
					</div>
					<div class="form-group">
						<label for="cardholder">Cardholder name</label>
						<input v-model="form.cardholder" type="text" class="form-control" placeholder="Ex. Robert Smith">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="mounth">Expiry date</label>
								<div class="row">
									<div class="col-md-6">
										<input v-model="form.mounth" type="text" class="form-control" maxlength="2" size="2" placeholder="Ex. MM">
									</div>
									<div class="col-md-6">
										<input v-model="form.year" type="text" class="form-control" maxlength="2" size="2" placeholder="Ex. YY">
									</div>
								</div>        
							</div>
							<div class="col-md-6">
								<label for="cvv">Cvv code</label>
								<input v-model="form.cvv" type="text" class="form-control" maxlength="4" size="4" placeholder="Ex. 000">
							</div>
						</div>        	
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Authorization</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	name: "identify_page",
	data() {
		return {
			form: {
				card: '',
				cardholder: '',
				mounth: '',
				year: '',
				cvv: ''
			},
			errors: {},
			success: false
		}
	},
	methods: {
		identity: function (e) {
			e.preventDefault();
			this.errors = [];

			axios.post('/identify', this.form)
				.then(() => {
					this.$router.push("/complete_page");
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
