var validate = function (boxes){
    for(var i=0; i< boxes.length; i++){
        if(isNaN($('#'+boxes[i]).val()))
        {
            $("#"+boxes[i]).val('0');
            return false;
        }else if($("#"+boxes[i]).val() == ''){
            return false;
        }
    }
    return true;
}

