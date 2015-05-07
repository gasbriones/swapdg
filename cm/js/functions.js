function submitportfolio() {
	$("portfolioform").submit();
}

function deleteitem(section,id) {
	if ( confirm("Se va a eliminar el item seleccionado.") ) {
		window.location.href='delete.php?section='+section+'&id='+id;
	} else {
		return;
	}
}