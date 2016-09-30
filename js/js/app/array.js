var Array = (function () {
    return {
        init : function () {
            //this.createArray();
        },
        // создать массив с нужным кол-вом элементов
        createArrayNum: function (length) {
            var index;
            var arr = [];
            for (index = 0; index < length; ++index) {
                arr[arr.length] = index; // или так что короче arr.push(index);
            }
            return arr;
        },
        // добавить элемент в начало/конец массива
        pushUnshiftArray: function (arr,element,add) {
            if (add == 'push') {
                arr.push(element);
            } else if(add == 'unshift'){
                arr.unshift(element);
            } else {
                arr.push(element);
            }
            return arr;
        }
    }
})();
