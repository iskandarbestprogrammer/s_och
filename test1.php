<div id="parentElement" class="row text-right">
    <label>Add another input line</label>
    <button onclick="addInputLine()" name="addInputLine" class="btn btn-default" ><span class="fa fa-plus"></span></button>
</div>
<script>
function addInputLine() {
var node = document.createElement("input",'sd');                 // Create an <input> node                         
document.getElementById("parentElement").appendChild(node);     // Append it to the parent
// alert(document.getElementById("sd"));
}

function print() {
   // Append it to the parent
alert(document.getElementById("sd"));
}
</script>

<button onclick="print()" name="print" class="btn btn-default" ><span class="fa fa-plus">Print</span></button>
</div>