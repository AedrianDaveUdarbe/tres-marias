export function createErrorMssg(msg, parentId) {
	const errorPrgrph = document.createElement("p");
	errorPrgrph.setAttribute("id", "error-mssg");
	errorPrgrph.setAttribute("class", "text-danger");
	errorPrgrph.innerText = msg;
	const parentEl = document.getElementById(parentId);
	parentEl.insertBefore(errorPrgrph, parentEl.querySelector("#login"));
}
