<template>
	<div>
		<div class="alert alert-success" v-if="saved">
			<strong>Success!</strong> Your pedido has been saved successfully.
		</div>

		<div class="well well-sm" id="pedido-form">
			<form class="form-horizontal" method="post" @submit.prevent="onSubmit">

        <div class="form-group">
					<label>Persona_id</label>
					<input type="number" v-model="pedido.persona_id" class="form-control input-sm" placeholder="Id de la persona">
				</div>

				<div class="form-group">
					<label>Vianda_id</label>
					<input type="number" v-model="pedido.vianda_id" class="form-control input-sm" placeholder="Id de la vianda">
				</div>

				<div class="form-group">
					<label>Fecha_solicitud</label>
					<input type="date" v-model="pedido.fecha_solicitud" class="form-control input-sm" placeholder="Fecha solicitud del pedido">
				</div>

        <div class="form-group">
					<label>Fecha_entega</label>
					<input type="date" v-model="pedido.fecha_entrega" class="form-control input-sm" placeholder="Fecha entrega del pedido">
				</div>

				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</template>

<script>
export default {

	data() {
		return {
			errors: [],
			saved: false,
			pedido: {
				persona_id: 0,
				vianda_id: 0,
				fecha_solicitud: null,
				fecha_entrega: null
			}
		};
	},

	methods: {
		onSubmit() {
			this.saved = false;

			axios.post('api/pedidos', this.pedido)
			.then(({data}) => this.setSuccessMessage())
			.catch(({response}) => this.setErrors(response));
		},

		setErrors(response) {
			this.errors = response.data.errors;
		},

		setSuccessMessage() {
			this.reset();
			this.saved = true;
		},

		reset() {
			this.errors = [];
			this.pedido = {persona_id: 0, vianda_id: 0, fecha_solicitud: null, fecha_entrega: null};
		}
	}
}
</script>
