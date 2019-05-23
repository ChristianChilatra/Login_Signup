var num = 2;
function adelante(){
    if (num<3){
        num++;
        var foto =document.getElementById("foto");
        foto.src="/Programacion Web/Fotos/foto"+num+".jpg";
    }              
}
function atras(){
    if (num>1){
        num--;
      var foto =document.getElementById("foto");
        foto.src="/Programacion Web/Fotos/foto"+num+".jpg";  
    }   
}