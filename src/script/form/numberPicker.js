function Increment(e) {
    var btnNode = e.target || e.srcElement;
    var parentNode = btnNode.parentNode;
    var inputNode = parentNode.getElementsByTagName('input');
    inputNode[0].value++;
}

function Decrement(e) {
    var btnNode = e.target || e.srcElement;
    var parentNode = btnNode.parentNode;
    var inputNode = parentNode.getElementsByTagName('input');
    inputNode[0].value--;
}

function IncrementNS(e) {
    timerNumberPicker = setInterval(function(){ Increment(e); }, 100);
}

function DecrementNS(e) {
    timerNumberPicker = setInterval(function(){ Decrement(e); }, 100);
}

function StopTimer() {
    clearInterval(timerNumberPicker);
}