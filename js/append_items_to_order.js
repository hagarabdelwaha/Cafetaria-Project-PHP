var figures = document.getElementsByTagName('figure');
var parentDiv = document.getElementById("products");
var totalPrice = document.getElementById("total");
var totalInput = document.getElementById("total_price");
for (var i = figures.length - 1; i >= 0; i--) {
	figures[i].addEventListener("click",function () {
		//console.log(this.id);
		var nameLabel = document.createElement("label");
		console.log(this.getAttribute("name"));
		nameLabel.textContent = this.getAttribute("name");
		nameLabel.style.display ="inline-block";
		nameLabel.style.width="25%";

		var input = document.createElement("input");
		input.id = this.id;
		input.name="product_quantity[]";
		input.style.width = "30px";
		input.style.display ="inline-block";
		input.value = "1";

		var productIdHidden = document.createElement("input");
		productIdHidden.name="product_id[]";
		productIdHidden.value = this.id;
		productIdHidden.type = "hidden";


		var quantity = this.getElementsByClassName("quantity")[0].value;
		// console.log(quantity);
		var plusBtn = document.createElement("button");
		plusBtn.className="plusBtn";


		var minusBtn = document.createElement("button");
		minusBtn.className="minusBtn";
		


		var priceLabel = document.createElement("label");
		var price = this.getAttribute("price");

		priceLabel.textContent = " EGP "+price;
		priceLabel.style.display ="inline-block";
		priceLabel.setAttribute("name", "prices[]");

		var delBtn  = document.createElement("button");
		delBtn.className = "delBtn";
		total.textContent = Number(total.textContent)+Number(price);
		totalInput.value = total.textContent;

		var productDiv= document.createElement("div");

		productDiv.appendChild(nameLabel);
		productDiv.appendChild(input);
		productDiv.appendChild(productIdHidden);
		productDiv.appendChild(plusBtn);
		productDiv.appendChild(minusBtn);
		productDiv.appendChild(priceLabel);
		productDiv.appendChild(delBtn);

		productDiv.style.margin = "5";
		productDiv.style.marginBottom = "15px";

		parentDiv.prepend(productDiv);

		//add event listener to plus/minus buttons
		plusBtn.addEventListener("click",function (e) {
			e.preventDefault();
			var currentQuantity = Number(input.value);
			if( currentQuantity < quantity){
				input.value = currentQuantity+1;
				priceLabel.textContent = " EGP "+(Number(price)*(currentQuantity+1));
				total.textContent = Number(total.textContent)+(Number(price));
				totalInput.value = total.textContent;

			}
		});

		minusBtn.addEventListener("click",function (e) {
			e.preventDefault();
			if(input.value > 1){
				input.value = Number(input.value)-1;
				// console.log(input.value);
				priceLabel.textContent = " EGP "+(Number(price)*Number(input.value));
				// console.log(price);
				// console.log(total.textContent);
				total.textContent = Number(total.textContent)-(Number(price));

				totalInput.value = total.textContent;
			}
		});

		delBtn.addEventListener("click",function (e) {
			e.preventDefault();
			parentDiv.removeChild(this.parentNode);
			total.textContent = Number(total.textContent)-(Number(price)*Number(input.value));
			totalInput.value = total.textContent;
			
		});

	});
}