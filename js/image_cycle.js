window.addEventListener("load", function(){
	var content = document.getElementById("s");
	var timer, ti=0, dir="img/";
	var obj1 = {name:"Get A Cab", btn:"Learn More", details:"Every Driver is manually screened, and thoroughly vetted for great service to our customers. These CABS run 24 hours from Monday - Saturday. \
	On Sundays they only run from 12pm - 11:00pm.Our cabs run around the Eastern part of Nigeria", pics:["cab.png","Taxi.png","van.png"] };
	var obj2 = {name:"Car/ Truck Hire", btn:"Learn More", details:"Whether you need a vehicle for an hour, a day, a week or longer, Morex Technology is the one place that make that offer for you.",pics:["six.jpg","cadi.png","suv_santa.png"] };
	var obj3 = {name:"Car Sales", btn:"Learn More", details:"We are a company that partner great with many car companies and industries in Nigeria providing you with pleasurable and comfortable cars of your choice.", pics:["carsale.png","carsale2.png","compact.png"]};
	var obj4 = {name:"Hotel Services", btn:"Learn More", details:"We partner with hotels around Anambra State for people entering /in Anambra State to lodge. These hotels run 24 hours from Monday - Sunday.", pics:["hotel.jpg","hotel2.jpg","luxury.jpg"]};
	var obj5 = {name:"Car Accessories", btn:"Learn More", details:"We have various Car Accessories for sale at affordable prices", pics:["car_ac.jpg","car_acc.jpg","lineup.jpg"]};
	var obj6 = {name:"Rentage", btn:"Learn More", details: "We rent various equipments viz Car, canopies, chairs, etc.", pics:["rentage.jpg","cabs.png"]};
	var ary = [obj1,obj2,obj3,obj4,obj5,obj6];
	
	for(var i=0; i < ary.length; i++){
		var div = document.createElement("div");
		var large = document.createElement("div");
		var small = document.createElement("div");
		var img = document.createElement("img");
		var h2 = document.createElement("h2");
		var btn = document.createElement("div");
		var p = document.createElement("p");
		
		div.className = "user";
		large.className = "col-lg-4";
		small.className = "col-md-4";
		btn.className = "link";
		//oi is object index
		img.oi = i;
		
		h2.innerHTML = ary[i].name;
		p.innerHTML = ary[i].details;
		img.src = dir + ary[i].pics[0];
		content.appendChild(large && small);
		large && small.appendChild(div);
		div.appendChild(img);
		div.appendChild(h2);
		div.appendChild(p);
		div.appendChild(btn);
		btn.innerHTML += "<a href='#' type='button' class='btn btn-primary'>"+ary[i].btn+"</a>";
		
		img.addEventListener("mouseover", function(event){
			timer = setInterval(function(){
				ti++;
				if(ti == ary[event.target.oi].pics.length){
					ti = 0;
				}
				event.target.src = dir + ary[event.target.oi].pics[ti];
			},700);
		});
		img.addEventListener("mouseout", function(event){
			clearInterval(timer);
			ti = 0;
			event.target.src = dir + ary[event.target.oi].pics[ti];
		});
	}
});
