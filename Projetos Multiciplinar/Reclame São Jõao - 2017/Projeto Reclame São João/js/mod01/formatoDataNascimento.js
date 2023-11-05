var DatePicker = (function () {
			var DatePicker = function (element) {
				var that = this;
				if (element instanceof jQuery) {
					this.element = element[0];
					this.wrapper = element;
				} else {
					this.element = element;
					this.wrapper = $(this.element);
				}

				if (this.isNative)
					return;

				this.element.type = "text";
				this.wrapper.datetimepicker({
					timepicker: false,
					mask: true,
					format: 'd/m/Y',
					onChangeDateTime: function (data, input) {
						var event = new Event("input");
						that.element.dispatchEvent(event);
					}
				});
				
				
				Object.defineProperty(this.element, "valueAsDate", {
					get: function () {
						return that.wrapper.datetimepicker("getValue");
					},
					set: function (value) {
						that.wrapper.datetimepicker({ value: value });
					}
				})
			}

			var input = document.createElement("input");
			Object.defineProperty(DatePicker.prototype, "isNative", {
				writerable: false,
				configurable: false,				
				value: "Data de Nascimento" in input
				//placeholder: "Data de Nascimento" in input
				
			})

			return DatePicker;
		})();

		var element = document.getElementById("CON_DATA_NASCIMENTO");
		var datePicker = new DatePicker(element);

		//element.valueAsDate = new Date();
		element.value = '';
		element.addEventListener("input", function (event) {
			console.log(element.valueAsDate);
		})