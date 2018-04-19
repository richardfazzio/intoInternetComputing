var GalToLiter = 3.78541; // 1 gal = 3.7L
var LiterToGal = 0.264172; // 1 liter = .26Gal

//var ip, op; //input, output
var dec = 0; // decision

var report = function (ip, op) {
   if(dec == 1)
   {
   	 document.getElementById("result").innerHTML =  //Gal->Liter
       op +" Gallon(s) =  "+ ip.toFixed(2) + " Liter(s)";
   }
   else if(dec == 2)
   {
   	 document.getElementById("result").innerHTML =  //Liters->Gal
        op +" Liter(s) = " + ip.toFixed(2) + " Gallon(s)";
   }
 	else
   {
   		alert("Monkeys ruined our experiment!");
   }
};

document.getElementById("Gal_to_L").onclick = function () {
   var ip = document.getElementById("volume").value;
    dec = 1;
    report(ip* GalToLiter, ip);

    

};

document.getElementById("L_to_Gal").onclick = function () {
   var ip = document.getElementById("volume").value;
    dec = 2;
    report(ip* LiterToGal, ip);


};
