<div class="text-center" style="margin-top: 200px;">
	<button onclick="tao_sitemap()" style="font-size: 50px;">Tạo sitemap.xml</button>
</div>

<script>
	function tao_sitemap () {
		const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    // document.getElementById("demo").innerHTML = this.responseText;
    alert(this.responseText);
    }
  xhttp.open("GET", "/tao_sitemap.php", true);
  xhttp.send();
	}
</script>