var count = 0 
document.getElementById("myButton").onclick = function() {
    count++
    if (count % 2 == 0){
        document.getElementById("demo").innerHTML = "";
    }else { 
        var img = document.createElement("img");
        img.src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtS1ezALTKcqb0UKSkO2BzhwX8zBGt-5G50w&usqp=CAU"
        document.getElementById("demo").appendChild(img);
    }
}