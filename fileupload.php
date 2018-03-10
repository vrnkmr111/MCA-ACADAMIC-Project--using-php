<input type="file" onchange="onFileSelected(event)">
<textarea id="result"></textarea>
<script>
function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var result = document.getElementById("result");

  reader.onload = function(event) {
    result.innerHTML = event.target.result;
  };

  reader.readAsText(selectedFile);
}
</script>