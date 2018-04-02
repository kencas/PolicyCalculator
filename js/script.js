function calculate() {

    

    var carvalue = document.frm.carvalue.value;
    var tax = document.frm.tax.value;
    var installments = document.frm.installments.value;

    if(!carvalue || typeof carvalue == 'undefined')
    {
        alert('Enter car value');
        return;
    }

    if(!tax || typeof tax == 'undefined')
    {
        alert('Enter Tax Rate');
        return;
    }

    if(!installments || typeof installments == 'undefined')
    {
        alert('Enter Repayment Installments');
        return;
    }

    $('#myModal').modal('hide');

   // return;
   
    var response = "<table border='1'  class='table table-striped table-bordered table-hover table-condensed'>";
    
    var policy = null;

    var weight = null;

    var data = new FormData();
data.append('carvalue', carvalue);
data.append('tax', tax);
data.append('installments', installments);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                data = JSON.parse(this.responseText);

                for(var index in data)
                {

                    

                    policy = data[index];
                    if(policy.metadata.type == "header")
                    weight = "bold";
                    else if(policy.metadata.type == "footer")
                    weight = "bold";
                    else
                    weight = "normal";
                    //alert(weight);
                    response += '<tr>';
                    response += '<td style="font-weight: ' + weight + '">' + policy.label + '</td>';
                    response += '<td style="font-weight: ' + weight + '">' + policy.policy + '</td>';

                    for(var index2 in policy.installments)
                    {
                        pol = policy.installments[index2];
                        response += '<td style="font-weight: ' + weight + '">' + pol + '</td>';
                    }

                    response += '</tr>';
                }
                
                response += '</table>';
                document.getElementById("result").innerHTML = response;

                //alert(response);
            }
        };
        xmlhttp.open("POST", "ajax/calculate.php", true);
        xmlhttp.send(data);
    
}