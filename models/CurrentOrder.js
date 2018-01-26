var container=document.getElementsByClassName('container')[0];
var orders_displayed=0;//orders.length;
var productsInfo_Arr;
var order_date;//finished ,delivered order;


function createTabledata(element,name){

	var th=document.createElement(element);
	var thtext=document.createTextNode(name);
	 th.appendChild(thtext)
	 return th;
}

function getProductprice(drinkname)
{
	var len=productsInfo_arr.length;
	for(var i=0;i<len;i++)
	 {
     prod_info=productsInfo_arr[i].split(",");
		 if(drinkname==prod_info[0])
		   return prod_info[1];
   }
}

function creatdrink(drinkname){

	var td=document.createElement('td');
	 td.setAttribute('class','drinksRaw')
	var img=document.createElement('img');
	img.setAttribute('class','drink')
	img.src=drinkname+'.png'
	td.appendChild(img)
	 return td;
}

function creatdrinkName(drinkname){

	var td=document.createElement('td');
	td.setAttribute('class','drinksRaw');
	var tdtext;
  price=getProductprice(drinkname);
	tdtext=document.createTextNode(drinkname+" :"+price+"$");
	td.appendChild(tdtext)
		 return td;
}

function creatdrinkCount(drinkCount){

var td=document.createElement('td');
 td.setAttribute('class','drinksRaw');
	var tdtext=document.createTextNode(drinkCount);
	 td.appendChild(tdtext)
	 return td;
}

function remove_order(e){

	var del_table=e.target.parentElement.parentElement.parentElement;
	order_date=del_table.children[1].children[0];
	container.removeChild(del_table);
	//console.log(order_date,order_date.innerHTML,typeof order_date);
	document.getElementById('done_order').setAttribute("value",order_date.innerHTML);
	//console.log(document.getElementById('done_order').value);
  document.getElementById("form").submit();
}

function update_html( orderDate,name,Room,extRoom,drinks,drinksCount,total,productsInfo_arr){

	productsInfo_Arr=productsInfo_arr;
	var table=document.createElement('table');
	table.setAttribute('class','t01');

	 var r1= document.createElement("tr");
		r1.appendChild(createTabledata('th',"Order Date"));
		r1.appendChild(createTabledata('th',"Name"));
	  r1.appendChild(createTabledata('th',"Room"));
	  r1.appendChild(createTabledata('th',"ExtRoom"));
   	r1.appendChild(createTabledata('th',"Action"));

	 var r2=document.createElement("tr");
	 r2.appendChild(createTabledata('td',orderDate));
   r2.appendChild(createTabledata('td',name));
	 r2.appendChild(createTabledata('td',Room));
	 r2.appendChild(createTabledata('td',extRoom));

    var td=document.createElement('td');
		var btn=document.createElement('button');
		btn.setAttribute('class',"tablinks")
		var tdtext=document.createTextNode("Deliver");
		btn.addEventListener('click',remove_order);
		btn.appendChild(tdtext)
		td.appendChild(btn)
    r2.appendChild(td);

	 var r3= document.createElement("tr");
		 for(var i=0;i<drinks.length;i++)
		    r3.appendChild(creatdrink(drinks[i]));

		var r4= document.createElement("tr");
			for(var i=0;i<drinks.length;i++)
	 		    r4.appendChild(creatdrinkName(drinks[i]));

		var r5= document.createElement("tr");
			for(var i=0;i<drinksCount.length;i++)
	 		    r5.appendChild(creatdrinkCount(drinksCount[i]));

	 var r6= document.createElement("tr");
	 var td=document.createElement('td');;
	 	var tdtext=document.createTextNode("Total Price : "+total);
	 	 td.appendChild(tdtext)
		 r6.appendChild(td)


	 table.appendChild(r1)
	 table.appendChild(r2)
	 table.appendChild(r3)
	 table.appendChild(r4)
	 table.appendChild(r5)
	 table.appendChild(r6);
//	 console.log(table)
	 container.appendChild(table);

}
