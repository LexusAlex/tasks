// лживые значения
var falsy = [0,-0,null,false,undefined,NaN,''];

for (var i = 0; i < falsy.length ; i++){
    if (!falsy[i]) {
        console.log('false значение js :',falsy[i]);
    }
}
