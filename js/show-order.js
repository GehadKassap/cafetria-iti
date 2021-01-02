function showorderdetails() {
    let Orderdetails = document.createElement("tr");
    Orderdetails.innerHTML=`<tr role="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                       </tr>`
    //let order = document.createTextNode("Water");
    //Orderdetails.appendChild(order);
    // Insert a row at the end of table
    //let newRow = tbodyRef.insertRow();

// Insert a cell at the end of the row
    //let newCell = newRow.insertCell();
    document.getElementById("ordertable").appendChild(Orderdetails);
}






/*let lineNo = 1;
$(document).ready(function () {
    $(".showorderdetails").click(function () {
        markup = "<tr><td>This is row "
            + lineNo + "</td></tr>";
        tableBody = $("table tbody");
        tableBody.append(markup);
        lineNo++;
    });
});*/