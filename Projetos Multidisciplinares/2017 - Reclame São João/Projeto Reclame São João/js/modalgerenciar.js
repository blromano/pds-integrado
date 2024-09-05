	$('#exampleModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient = button.data('whatever') // Extract info from data-* attributes
	var recipientnome = button.data('whatevernome')
	var recipientdetalhes = button.data('whateverdetalhes')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-title').text('ID da Reclamação #' + recipient)
	modal.find('#id-curso').val(recipient)
	modal.find('#recipient-name').val(recipientnome)
	modal.find('#detalhes').val(recipientdetalhes)
	})
	
	$('#exampleModal2').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient = button.data('whatever') // Extract info from data-* attributes
	var recipientnome = button.data('whatevernome')
	var recipientdetalhes = button.data('whateverdetalhes')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-title').text('ID da Reclamação #' + recipient)
	modal.find('#id-curso').val(recipient)
	modal.find('#recipient-name').val(recipientnome)
	modal.find('#detalhes').val(recipientdetalhes)
	})