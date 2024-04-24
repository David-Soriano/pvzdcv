function eli(){
	let v = confirm("¿Esta seguro de eliminar este registro?");
	return v;
}

// function ocultar(m=5){
// 	if(m = 1){
// 		document.getElementById('ins').style.display = 'none';
// 	} else if(m = 2){
// 		document.getElementById('ins').style.display = 'inherit';
// 	}	
// }

let btn1 = document.getElementById('btnadd');
let btn2 = document.getElementById('btnmns');
btn1.style.display = 'none';
btn2.addEventListener('click',()=>{
	document.getElementById('ins').style.height = '0';
	btn1.style.display = 'inherit';
	btn2.style.display = 'none';
});
btn1.addEventListener('click', ()=>{
	document.getElementById('ins').style.height = '30vh';
	btn1.style.display = 'none';
	btn2.style.display = 'inherit';
});


function reloadMun(dep){
	var parametros ={
		"valor" : dep
	};
	$.ajax({
		data: parametros,
		url: 'views/selmun.php',
		type: 'POST',
		success: function(response){
			$("#reload").html(response);
		}
	});
}