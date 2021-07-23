const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button button"),
errorText = form.querySelector(".error-txt");


form.onsubmit = (e)=>{
	e.preventDefault(); // preventing form from submitting
}

continueBtn.onclick = ()=>{
	// Ajax
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "/clients/event-client-add", true);
	xhr.onload = ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				let data = xhr.response;
				if (data == "success") {
					location.href = "/calendar";
				} else {
					errorText.textContent = data;
					errorText.style.display = "block";
				}
			}
		}
	}
	let formData = new FormData(form);
	xhr.send(formData);
}
