var a = 10;

function pow(x:number, i:number):number {

  if(i!= 1) {
    return x * pow(x, i - 1);
  } else {
    return x;
  }
}


var x, n;
var element = document.getElementById('coffee');

x = prompt('Enter x: ') + 0;
n = prompt('Enter n: ')+ 0;
