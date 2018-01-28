var container=document.getElementsByClassName('container')[0];
var total=document.getElementById('total');
var lenArr;
var ordersArr;
var productsInfo_arr;
var table2Created=0;
var table2hasRows=0;
var drinksDisplayed=0;
var userName="";
var datesel="";
var ordereditemArr=[];
var items_numArr=[];


function creatdrink(drinkname){

	var td=document.createElement('td');
	 td.setAttribute('class','drinksRaw')
	var img=document.createElement('img');
	img.setAttribute('class','drink')
	img.src='imgs/'+drinkname+'.png'
	td.appendChild(img)
	 return td;
}

function getProductprice(drinkname)
{
	var len=productsInfo_arr.length;
	//console.log(len,productsInfo_arr);

  for(var i=0;i<len;i++)
	 {
     prod_info=productsInfo_arr[i].split(",");
		 if(drinkname == prod_info[0])
		 {
			 return prod_info[1];
		 }
   }
}

function creatdrinkName(drinkname,price){
	var td=document.createElement('td');
	td.setAttribute('class','drinksRaw');
	var tdtext;
	var price=getProductprice(drinkname);
	tdtext=document.createTextNode(drinkname+" :"+price+"$");
	td.appendChild(tdtext)
		 return td;
}

function creatdrinkCount(drinkcount){
	var td=document.createElement('td');
	td.setAttribute('class','drinksRaw');
	var tdtext;
	tdtext=document.createTextNode(drinkcount);
	td.appendChild(tdtext)
		 return td;
}

function showUserOrder(e){
	if(!drinksDisplayed){
						var div=document.createElement('div');
						div.setAttribute('class','item');

						var tableimg=document.createElement('table');
						div.appendChild(tableimg);

						datesel=e.target.nextSibling.textContent;
						//console.log(datesel)
					 	for(var i=0;i<lenArr;i++)
					 	{
					 		orderU=ordersArr[i].split(':');
							if(datesel==orderU[0]){
                  ordereditem=orderU[3];
									items_num=orderU[4];
									ordereditemArr=ordereditem.split(',');
									items_numArr=items_num.split(',');
									//console.log(ordereditemArr);
									//console.log(items_numArr);


							}
						}
							 len=ordereditemArr.length;
							 //console.log(len);
							 var tr1=document.createElement('tr')
							 var tr2=document.createElement('tr')
							 var tr3=document.createElement('tr')
							 for(var i=0;i<len;i++){
								 //console.log(ordereditemArr[i])
							       tr1.appendChild(creatdrink(ordereditemArr[i]))

													}
							 						tableimg.appendChild(tr1);

							 			for(var i=0;i<len;i++){
			 						//var price=getProductprice(ordereditemArr[i]);
							  			tr2.appendChild(creatdrinkName(ordereditemArr[i]))

							     			}
							 					tableimg.appendChild(tr2);

												for(var i=0;i<len;i++){
							 							tr3.appendChild(creatdrinkCount(items_numArr[i]))
							  						}
							  					tableimg.appendChild(tr3);
							      				div.appendChild(tableimg);
							  				drinksDisplayed=1;
												container.appendChild(div);
												total.appendChild(createTotalAmount(55));



	}

	else{
		 console.log(container.lastChild)
		 container.removeChild(container.lastChild);
		 total.removeChild(total.lastChild);

	   drinksDisplayed=0;
	 }

}

function buildTable(){

  table=document.createElement('table');
  table.setAttribute('class','t01');
  var r1= document.createElement("tr");
	 r1.appendChild(createTabledata('th',"Order Date"));
	 r1.appendChild(createTabledata('th',"Status"));
	 r1.appendChild(createTabledata('th',"Amount"));
	 r1.appendChild(createTabledata('th',"Action"));

	 table.appendChild(r1)
	 container.appendChild(table);

}


function creatDateField(date,fnDate){

	var td=document.createElement('td');
	var thtext=document.createTextNode(date);
	var img=document.createElement('img');
	img.src='imgs/show.png'
	img.addEventListener('click',fnDate);
	td.appendChild(img)
	td.appendChild(thtext);
	 return td;
}
function createTabledata(element,name){

	var th=document.createElement(element);
	var thtext=document.createTextNode(name);
	 th.appendChild(thtext)
	 return th;
}

function createTotalAmount(price)
{
	var newdiv=document.createElement("div")
	var total=document.createElement("p");
	var Price=document.createElement("input");
	total.textContent="Total";
	price.value=price;
	newdiv.appendChild(total);
	newdiv.appendChild(Price);
	return newdiv;
}

function update_order_HTML(Orderdate,status,amount){
	 var r2=document.createElement("tr");
	 r2.appendChild(creatDateField(Orderdate, showUserOrder));
   r2.appendChild(createTabledata('td',status));
	 r2.appendChild(createTabledata('td',amount));
	 if (status == "processing")
	 {
	 r2.appendChild(createTabledata('td',"Cancel"));
   }
	 else {
		 r2.appendChild(createTabledata('td'," "));

	 }


	 table.appendChild(r2)
	//  container.appendChild(table);

}
function update_order(length,OrdersArray,productInfo){

   //console.log("js")
   lenArr=length;
	 ordersArr=OrdersArray;
	 productsInfo_arr=productInfo;

	 //console.log(length,OrdersArray);
	 buildTable();
	 for(var i=0;i<length;i++)
	 {
		 orderU=OrdersArray[i].split(':');
		 //console.log(orderU[0],orderU[1],orderU[2])
		update_order_HTML(orderU[0],orderU[1],orderU[2])
	 }

}
