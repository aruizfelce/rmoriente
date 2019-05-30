





$('#registrationForm').bootstrapValidator({

	 feedbackIcons: {

		 valid: 'glyphicon glyphicon-ok',

		 invalid: 'glyphicon glyphicon-remove',

		 validating: 'glyphicon glyphicon-refresh'

	 },

	 fields: {

		 cedula: {

			 validators: {

				 notEmpty: {

					 message: 'La cédula es requerida'

				 }

			 }

		 },

		 nombre: {

			 validators: {

				 notEmpty: {

					 message: 'El nombre es requerido'

				 }

			 }

		 },

		 email: {

			 validators: {

				 notEmpty: {

					 message: 'El correo es requerido y no puede ser vacio'

				 },

				 emailAddress: {

					 message: 'El correo electronico no es valido'

				 }

			 }

		 },

		 password: {

			 validators: {

				 notEmpty: {

					 message: 'El password es requerido y no puede ser vacio'

				 },

				 stringLength: {

					 min: 8,

					 message: 'El password debe contener al menos 8 caracteres'

				 }

			 }

		 },


		 sexo: {

			 validators: {

				 notEmpty: {

					 message: 'El sexo es requerido'

				 }

			 }

		 },

		 telefono: {

			 message: 'El teléfono no es valido',

			 validators: {

				 notEmpty: {

					 message: 'El teléfono es requerido y no puede ser vacio'

				 },

				 regexp: {

					 regexp: /^[0-9]+$/,

					 message: 'El teléfono solo puede contener números'

				 }

			 }

		 },

		 telefono_cel: {

			 message: 'El teléfono no es valido',

			 validators: {

				 regexp: {

					 regexp: /^[0-9]+$/,

					 message: 'El teléfono solo puede contener números'

				 }

			 }

		 },



	 }

});