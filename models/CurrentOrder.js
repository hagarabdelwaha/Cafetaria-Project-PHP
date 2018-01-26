var container=document.getElementsByClassName('container')[0];
var orders_displayed=0;//orders.length;


function createTabledata(element,name){

	var th=document.createElement(element);
	var thtext=document.createTextNode(name);
	 th.appendChild(thtext)
	 return th;
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
	td.setAttribute('class',drinkname);
	var tdtext=document.createTextNode(drinkname);
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
function update_html( orderDate,name,Room,extRoom,drinks,drinksCount,total){
	 console.log("update html js")
	 console.log(container)
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
		btn.appendChild(tdtext)
		td.appendChild(btn)
    r2.appendChild(td);

	 var r3= document.createElement("tr");
		 for(var i=0;i<drinks.length;i++)
		    r3.appendChild(creatdrink(drinks[i]));

		var r4= document.createElement("tr");
			for(var i=0;i<drinks.length;i++)
	 		    r4.appendChild(creatdrinkCount(drinks[i]));

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
