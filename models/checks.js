var container=document.getElementsByClassName('container')[0];

var lenArr;
var ordersArr;
var table2Created=0;
var table2hasRows=0;
var drinksDisplayed=0;
var userName="";
var datesel="";
function createTabledata(element,name){

	var th=document.createElement(element);
	var thtext=document.createTextNode(name);
	 th.appendChild(thtext)
	 return th;
}

function buildTable(){

  table=document.createElement('table');
  table.setAttribute('class','t01');
  var r1= document.createElement("tr");
	 r1.appendChild(createTabledata('th',"Name"));
	 r1.appendChild(createTabledata('th',"Total Amount"));
	 table.appendChild(r1)

}


function TableUserOrder(){
		if(!table2Created){
		  table2=document.createElement('table');
		  table2.setAttribute('class','t01');
		  var r1= document.createElement("tr");
			 r1.appendChild(createTabledata('th',"Order Date"));
			 r1.appendChild(createTabledata('th',"Amount"));
			 table2.appendChild(r1)
			 container.appendChild(table2)
			 table2Created=1;
		 }
}

function fillTableUserOrder(date,total){
		if(!table2hasRows){
					console.log(date.split(','),"ddd",total)
					var len=date.split(',').length;
					var dateArr=date.split(',');
					var totalArr=total.split(',');

					for(var i=0;i<len;i++){
							var r2=document.createElement("tr");
							r2.appendChild(creatNameShow(dateArr[i],showUserOrderItem));
							r2.appendChild(createTabledata('td',totalArr[i]));

							table2.appendChild(r2)
				}
					table2hasRows=1;
		 }
		 else{
			 console.log(container.children)
			 if(container.children.length==7)
			 {
				 container.removeChild(container.lastChild);
				 drinksDisplayed=0;
			 }
			 var len=table2.children.length;
			 for(var c=1;c<len;c++){
			   table2.removeChild(table2.children[1]);

				table2hasRows=0;
			}
		 }
}

function showUserOrder(e){

	userName=e.target.nextSibling.textContent;
	  console.log(userName)
	for(var i=0;i<lenArr;i++)
	{
		orderU=ordersArr[i].split(':');
	  console.log(userName,orderU[0],userName==orderU[0])
		if(userName==orderU[0]){

		  console.log(orderU[2]);
			 console.log(orderU[3]);
			 TableUserOrder()
			fillTableUserOrder(orderU[2],orderU[3])
		 }
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
	var tdtext=document.createTextNode(drinkname);
	td.appendChild(tdtext)
		 return td;
}

function showUserOrderItem(e){

if(!drinksDisplayed){
					var div=document.createElement('div');
					div.setAttribute('class','item');

					var tableimg=document.createElement('table');
					div.appendChild(tableimg);

					datesel=e.target.nextSibling.textContent;
					console.log(datesel)
					for(var i=0;i<lenArr;i++)
					{
						orderU=ordersArr[i].split(':');
						if(userName==orderU[0]){
							dateU=orderU[2].split(',');
							index=dateU.indexOf(datesel)
						   orderType=orderU[4].split('/')[index];
							 orderQuan=orderU[5].split('/')[index];
							 break;
					}
				}
					console.log(orderType.split(','),orderQuan.split(','))
			     orderTypeArr=orderType.split(',');
					 orderQuan=orderQuan.split(',');
					 len=orderTypeArr.length;

					 var tr1=document.createElement('tr')
					 var tr2=document.createElement('tr')
					 var tr3=document.createElement('tr')
						for(var i=0;i<len;i++){
							tr1.appendChild(creatdrink(orderTypeArr[i]))
						}
						tableimg.appendChild(tr1);
						for(var i=0;i<len;i++){
							tr2.appendChild(creatdrinkName(orderTypeArr[i]))
						}
						tableimg.appendChild(tr2);
						for(var i=0;i<len;i++){
							tr3.appendChild(creatdrinkName(orderQuan[i]))
						}
					tableimg.appendChild(tr3);

			  container.appendChild(div);
				drinksDisplayed=1;
   }
	 else{
		 console.log(container.lastChild)
		 container.removeChild(container.lastChild);
	   drinksDisplayed=0;
	 }
}


function creatNameShow(name,fnName){

	var td=document.createElement('td');
	var thtext=document.createTextNode(name);
	var img=document.createElement('img');
	img.src='show.png'
	img.addEventListener('click',fnName);
	td.appendChild(img)
	td.appendChild(thtext);
	 return td;
}

function update_Checks_HTML(name,total){
	 var r2=document.createElement("tr");
	 r2.appendChild(creatNameShow(name, showUserOrder));
   r2.appendChild(createTabledata('td',total));

	 table.appendChild(r2)
	  container.appendChild(table);

}
function update_Checks(length,OrdersArray){

   lenArr=length;
	 ordersArr=OrdersArray;
	 console.log(length,OrdersArray);
	 buildTable();
	 for(var i=0;i<length;i++)
	 {
		 orderU=OrdersArray[i].split(':');
		 console.log(orderU[0],orderU[1])
		 update_Checks_HTML(orderU[0],orderU[1])
	 }

}
