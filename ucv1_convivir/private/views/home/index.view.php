<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		<h1>Pagina Principal</h1>
		<pre>
			<?php print_r($data);?>
		</pre>
	 
	</div>
 
<?php $this->view('includes/footer')?>
